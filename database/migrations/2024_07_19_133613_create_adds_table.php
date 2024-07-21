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
        Schema::create('adds', function (Blueprint $table) {
            $table->id('id_operation');
            $table->unsignedBigInteger('book');
            $table->unsignedBigInteger('librarian');
            $table->bigInteger('added_qty')->nullable(false);
            $table->date('operation_date')->nullable(false);
            $table->timestamps();


            $table->foreign('book')->references('id_book')->on('books')->onDelete('no action');
            $table->foreign('librarian')->references('id_librarian')->on('librarians')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adds');
    }
};
