<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('question_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id'); // Clé étrangère vers la table "questions" pour la question associée
            $table->string('texte_option'); // Texte de l'option de réponse
            $table->boolean('est_correcte')->default(false); // Indicateur d'option de réponse correcte
            $table->timestamps(); // Pour la date de création et de mise à jour automatique
    
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_options');
    }
};
