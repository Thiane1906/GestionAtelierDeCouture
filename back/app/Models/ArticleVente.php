<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleVente extends Model
{
    use HasFactory;
    protected $guarded=[

    ];
    public function articles(){
        return $this->belongsToMany(Article::class,"ventes")->withPivot("qte");
    }

    // public function ventes(){
    //     return $this->hasMany(Vente::class);
    // }

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

}
