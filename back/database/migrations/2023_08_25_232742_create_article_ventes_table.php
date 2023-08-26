<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('article_ventes', function (Blueprint $table) {
            $table->id();
            $table->string("libelle");
            $table->integer("valeurPromo")->nullable();
            $table->integer("prixProd");
            $table->integer("prixVente");
            $table->integer("marge");
            $table->integer("qteStock");
            $table->string("ref");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_ventes');
    }
};
