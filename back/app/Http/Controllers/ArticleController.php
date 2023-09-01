<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\CategorieResource;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            return ArticleResource::collection(Article::all());
            // return Article::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "libelle" => "required|alpha|min:3|unique:fournisseurs",
            "prix"=>"required",
            "stock"=>"required",
            "categorie_id"=>"required",
            "photo"=>"required"

        ]);
        
        $article = Article::firstOrCreate([
            "libelle"=>$request->libelle,
            "prix"=>$request->prix,
            "stock"=>$request->stock,
            "categorie_id"=>$request->categorie_id,
            "photo"=>$request->photo
        ]);
        $article->fournisseurs()->attach($request->idsFour);
        return response()->json([
            "data"=>$article,
            "message"=>"article ajouté avec succès",
            "success"=>true
         ]);
    }

    public function articleFournisseur(){
        $data=[];
        $category = CategorieResource::collection(Categorie::all())  ;
        $fournisseur=Fournisseur::all();
        $data=$category.$fournisseur;
         return $data;
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $article->update($request->only("libelle","prix","stock"));
        return $article;
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
       return $article->delete();
    }
    // public function getNbreDeLibelleDuneCategorie(Request $request ,$id){
        
    //     return count(Article::where("categorie_id",$request->id)->get());
    // }
}
