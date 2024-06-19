<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paymentss', function (Blueprint $table) {
                $table->id();
                $table->string('item_name');
                $table->decimal('item_price', 10, 2);
                $table->string('currency');
                $table->string('status')->default('pending');
                $table->string('ref_command')->unique();
                $table->string('user_ip');
                $table->string('user_lang');
                $table->string('payment_id')->nullable();
                $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('operator_id');
            $table->dropColumn('operator');
            $table->dropColumn('paid_amount');
            $table->dropColumn('paid_currency');
            $table->dropColumn('payment_date');
        });

    }
};
