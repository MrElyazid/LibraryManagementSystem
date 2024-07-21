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
        Schema::create('authors', function (Blueprint $table) {
            $table->id('id_author');
            $table->string('name');
            $table->string('lastname');
            $table->unique(['name','lastname']);
            $table->date('birth_date');
            $table->text('description');
            $table->unsignedBigInteger('image')->nullable();
            $table->foreign('image')->references('id_image')->on('images')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
