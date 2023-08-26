<?php

namespace App\Models;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=[

    ];
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
    public function aticlesVente(){
        return $this->belongsToMany(ArticleVente::class,"ventes");
    }
}
