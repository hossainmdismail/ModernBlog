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
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('plans_id');
            $table->string('order_id');
            $table->string('name');
            $table->string('email');
            $table->string('number')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->enum('status',['pending','success','cancel'])->default('pending');
            $table->integer('payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};
