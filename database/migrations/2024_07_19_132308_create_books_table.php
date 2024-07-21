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
        Schema::create('books', function (Blueprint $table) {
            $table->id('id_book');
            $table->string('isbn')->nullable(false);
            $table->string('title')->nullable(false);
            $table->unsignedBigInteger('category');
            $table->set('status', ['Available','Coming Soon', 'Not Available'])->nullable(false);
            $table->bigInteger('quantity')->nullable(false);
            $table->unsignedBigInteger('image');
            $table->unsignedBigInteger('author');

            $table->foreign('category')
                  ->references('id_category')
                  ->on('categories')
                  ->onDelete('no action');

            $table->foreign('image')
                  ->references('id_image')
                  ->on('images')
                  ->onDelete('no action');
            
            $table->foreign('author')
                    ->references('id_author')
                    ->on('authors')
                    ->onDelete('no action');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
