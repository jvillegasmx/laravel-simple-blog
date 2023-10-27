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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title',300)->nullable();
            $table->longText('content')->nullable();
            $table->string('url',300)->nullable();
            $table->integer('order')->nullable()->default(0);
            $table->boolean('status')->default(true);
            $table->string('image',300)->nullable();
            $table->string('tags',300)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
