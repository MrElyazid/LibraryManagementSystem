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
        Schema::create('loans', function (Blueprint $table) {
            $table->id('id_loan');
            $table->unsignedBigInteger('book');
            $table->unsignedBigInteger('client');
            $table->date('date_borrowed')->nullable(false);
            $table->date('due_date')->nullable(false);
            $table->date('return_date')->nullable();

            $table->unique(['book','client']);
            $table->foreign('book')->references('id_book')->on('books')->onDelete('restrict');
            $table->foreign('client')->references('id_client')->on('clients')->onDelete('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
