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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('hashid')->nullable()->unique();

            $table->string('titre');
            $table->text('description');
            $table->string('chemin_vers_video');
            $table->string('realisateur')->nullable();
            $table->integer('duree_minutes')->nullable();
            $table->date('date_sortie')->nullable();
            $table->string('format')->nullable();
            $table->boolean('is_active')->default(true);

            // Ajoutez d'autres colonnes selon vos besoins
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('hashid');

            $table->dropColumn('is_active');
        });
    }
};
