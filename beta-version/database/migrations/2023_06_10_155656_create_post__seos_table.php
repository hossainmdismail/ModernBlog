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
        Schema::create('post__seos', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id');
            $table->string('meta_title');
            $table->string('meta_tags');
            $table->string('meta_descp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post__seos');
    }
};
