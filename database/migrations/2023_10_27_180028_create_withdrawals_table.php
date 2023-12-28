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
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->string('hashid')->nullable()->unique();

            $table->decimal('amount', 10, 2);
            $table->string('payment_method');
            $table->string('status');
            $table->boolean('disabled')->default(false);

        

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawals');

        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('hashid');
        });
    }
};
