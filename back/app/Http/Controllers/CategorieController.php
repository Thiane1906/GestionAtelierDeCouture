<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;


class CategorieController extends Controller
{
    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return Categorie::paginate(3);
        //   return Categorie::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "libelle" => "required|alpha|min:3|unique:categories"
        ]);

     return   Categorie::firstOrCreate([
            "libelle"=>$request->libelle,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($category, Request $request)
    {
        $data=[];
        $libelle=Categorie::where("libelle", $category)->first();
      
        if (!$libelle) {
            return response()->json([
                "message"=>"libelle introuvable !!!", 
                "data"=>$data,
             ]);
        }
        $data=[$libelle];
        return response()->json([
            "message"=>"libelle trouvé", 
            "data"=>$data,
         ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $category)
    {
       $category->update($request->only("libelle"));
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteCategories(Request $request,Categorie $category)
    {
       $category= Categorie::find($request->ids);
  
       if (count($category)==0) {
         return "erreur";
     }
        $category->each->delete();

        return response()->json([
            "message"=>"enregistrements supprimés avec succès", 
            "data"=>$category,
         ]);
    }
}
