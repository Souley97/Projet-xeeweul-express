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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(true); // Ajoutez cette ligne pour la colonne "active"
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('video_id');
            $table->timestamps();

            $table->unique(['user_id', 'video_id']); // Assure l'unicité des likes par utilisateur et vidéo

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
