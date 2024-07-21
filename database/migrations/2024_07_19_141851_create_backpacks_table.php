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
        Schema::create('backpacks', function (Blueprint $table) {
            $table->id('id_backpack');
            $table->unsignedBigInteger('client');
            $table->unsignedBigInteger('book');

            $table->unique(['book','client']);

            $table->foreign('client')->references('id_client')->on('clients');
            $table->foreign('book')->references('id_book')->on('books')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backpacks');
    }
};
