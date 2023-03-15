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
        Schema::create('quotes', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->id();
            $table->string('text');
            $table->unsignedBigInteger('author_ID')->nullable();
            $table->unsignedBigInteger('book_ID')->nullable();
            $table->unsignedBigInteger('genre_ID')->nullable();
            $table->timestamps();

            $table->foreign('author_ID')->references('id')->on('authors')->onDelete('cascade');
            $table->foreign('book_ID')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('genre_ID')->references('id')->on('genres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
