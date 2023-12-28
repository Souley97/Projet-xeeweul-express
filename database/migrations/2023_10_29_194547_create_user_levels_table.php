<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('user_levels', function (Blueprint $table) {
            $table->id();
            $table->string('level_name');
            $table->integer('points_required');

            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->unsignedBigInteger('deleted_by');
            // Ajoutez d'autres colonnes au besoin
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_levels');
    }
}


