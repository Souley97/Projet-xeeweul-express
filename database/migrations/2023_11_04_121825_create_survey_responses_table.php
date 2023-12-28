<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyResponsesTable extends Migration
{
    public function up()
    {
        Schema::create('survey_responses', function (Blueprint $table) {
            $table->id();
            $table->string('hashid')->nullable()->unique();

     
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('option_id');
            $table->timestamps();
            
            // Ajoutez des clés étrangères
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('option_id')->references('id')->on('answers');
        });
    }

    public function down()
    {
        Schema::dropIfExists('survey_responses');

        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('hashid');
        });
    }
}
