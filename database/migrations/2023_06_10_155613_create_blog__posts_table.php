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
        Schema::create('blog__posts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->string('title');
            $table->string('slug');
            $table->string('photo');
            $table->longText('content');
            $table->integer('views')->default(0);
            $table->integer('heart')->default(0);
            $table->enum('premium',['free','premium'])->default('free');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog__posts');
    }
};
