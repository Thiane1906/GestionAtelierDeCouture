<?php

namespace App\Http\Resources;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategorieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "nbreArticles"=>count(Article::where("categorie_id",$this->id)->get()),
            "id"=>$this->id,
            "libelle" => $this->libelle
        ];
    }
}
