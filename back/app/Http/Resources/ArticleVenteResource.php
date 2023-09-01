<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleVenteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "libelle" => $this->libelle,
            "valeurPromo"=>$this->valeurPromo,
            "prixProd"=>$this->prixProd,
            "prixVente"=>$this->prixVente,
            "marge"=>$this->marge,
            "qteStock"=>$this->qteStock,
            "ref"=>$this->ref,
            "categorie_id"=>CategorieResource::make($this->categorie),
            // "confections"=>$this->articles,
        
            "confections"=>ArticleResource::collection($this->articles)
        ];
    }
}
