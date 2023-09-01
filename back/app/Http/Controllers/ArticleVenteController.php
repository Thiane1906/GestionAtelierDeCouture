<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleVenteResource;
use App\Models\Article;
use App\Models\ArticleVente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleVenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

       $articleVente = ArticleVente::all();
        return response()->json([
            "data" =>ArticleVenteResource::collection($articleVente) ,
            "message" => "category",
            "success" => true
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "libelle" => "required|alpha|min:3",
            "prixProd" => "required",
            "prixVente" => "required",
            "marge" => "required",
            "qteStock" => "required",
            "ref" => "required",
        ]);
        // if (count($request->idsArticles) < 3) {
        //     return response()->json([
        //         "data" => [],
        //         "message" => "erreur",
        //         "success" => false
        //     ]);
        // }
        return DB::transaction(function()use($request) {
            $articleVente = ArticleVente::firstOrCreate([
                "libelle" => $request->libelle,
                "valeurPromo" => $request->valeurPromo,
                "prixProd" => $request->prixProd,
                "prixVente" => $request->prixVente,
                "marge" => $request->marge,
                "qteStock" => $request->qteStock,
                "ref" => $request->ref,
                "categorie_id" => $request->categorie_id
            ]);
       $newConf= array_map(function($e){
            unset($e['libelle']);
            return $e;
        },$request->confections);
            $articleVente->articles()->attach($newConf);
            
            return response()->json([
                "data" => $articleVente,
                "message" => "article inséré avec succès",
                "success" => true
            ]);
        });
    }

    public function getArticleConf(){
       return ArticleResource::collection(Article::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(ArticleVente $articleVente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ArticleVente $articleVente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ArticleVente $articleVente)
    {
        $articleVente->update($request->only("libelle", "valeurPromo", "prixProd", "prixVente", "marge", "qteStock", "ref"));
        return $articleVente;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticleVente $articleVente)
    {

        $data = $articleVente->delete();
        return response()->json([
            "data" => $data,
            "message" => "article supprimé avec succès",
            "success" => true
        ]);
    }
}
