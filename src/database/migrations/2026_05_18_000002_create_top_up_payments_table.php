<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('top_up_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->string('player_id')->nullable()->index();
            $table->string('order_id')->nullable()->index();
            $table->decimal('amount', 16, 2)->default(0);
            $table->string('currency', 10)->default('IDR');
            $table->string('status')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('transaction_id')->nullable()->index();
            $table->json('metadata')->nullable();
            $table->string('ip')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('top_up_payments');
    }
};
