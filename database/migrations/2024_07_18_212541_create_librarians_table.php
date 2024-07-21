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
        Schema::create('librarians', function (Blueprint $table) {
            $table->id('id_librarian');
            $table->string('name')->nullable(false);
            $table->string('lastname')->nullable(false);
            $table->string('phone_number')->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('email')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('librarians');
    }
};
