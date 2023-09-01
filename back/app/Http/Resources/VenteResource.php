<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VenteResource extends JsonResource
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
			"article_id"=>$this->article_id,
			// "article_vente_id"=>$this->article_vente_id,
			"qte"=>$this->qte,
        ];
    }
}
