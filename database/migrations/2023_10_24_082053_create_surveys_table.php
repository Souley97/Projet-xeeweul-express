<?php

// database/migrations/xxxx_xx_xx_create_surveys_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('hashid')->nullable()->unique();

            $table->string('titre');
            $table->text('description');
            $table->integer('recompense_en_points');
            $table->decimal('montant_recompense', 10, 2);
            $table->timestamp('date_limite');

            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->unsignedBigInteger('deleted_by');
            // Ajoutez d'autres colonnes au besoin
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surveys');

        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('hashid');
        });
}
}
