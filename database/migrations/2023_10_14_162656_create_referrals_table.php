<?php
// database/migrations/xxxx_xx_xx_create_referrals_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralsTable extends Migration
{
    public function up()
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('referrer_id'); // ID de l'utilisateur parrain
            $table->unsignedBigInteger('referred_id'); // ID de l'utilisateur parrainé
            $table->timestamps();

            $table->foreign('referrer_id')->references('id')->on('users');
            $table->foreign('referred_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('referrals');
    }
}
