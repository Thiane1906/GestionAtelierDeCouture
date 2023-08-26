<?php

namespace App\Http\Controllers;

use App\Models\ArticleVente;
use Illuminate\Http\Request;

class ArticleVenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            "libelle" => "required|alpha|min:3|unique:fournisseurs",
            "prixProd"=>"required",
            "prixVente"=>"required",
            "marge"=>"required",
            "qteStock"=>"required",
            "ref"=>"required",
        ]);

        $articleVente= ArticleVente::firstOrCreate([
        "libelle"=>$request->libelle,
        "valeurPromo"=>$request->valeurPromo,
        "prixProd"=>$request->prixProd,
        "prixVente"=>$request->prixVente,
        "marge"=>$request->marge,
        "qteStock"=>$request->qteStock,
        "ref"=>$request->ref
        ]);
        foreach ($request->qte as $key) {    
            $articleVente->articles()->attach($request->idsArticles, ["qte"=>$key]);
        }
        return response()->json([
            "data"=>$articleVente,
            "message"=>"article inséré avec succès",
            "success"=>true
         ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticleVente $articleVente)
    {
        return $articleVente->delete();
    }
}
