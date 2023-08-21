<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\CategorieResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "libelle"=>$this->libelle,
            "prix"=>$this->prix,
            "stock"=>$this->stock,
            "categorie"=>(new CategorieResource($this->categorie))
        ];
    }
}
