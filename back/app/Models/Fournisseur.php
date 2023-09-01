<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    protected $hidden=[
        "created_at",
        "updated_at",
        "id"
    ];

    public function articles(){
        return $this->belongsToMany(Article::class,"approvisionnements");
    }
}
