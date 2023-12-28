<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_answers_table.php

public function up()
{
    Schema::create('answers', function (Blueprint $table) {
        $table->id();
        $table->string('hashid')->nullable()->unique();

        $table->unsignedBigInteger('question_id');
        $table->string('reponses');
        $table->boolean('is_correct');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');

        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('hashid');
        });
    }
};
