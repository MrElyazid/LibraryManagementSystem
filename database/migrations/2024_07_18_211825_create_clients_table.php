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
        Schema::create('clients', function (Blueprint $table) {
            $table->id('id_client');
            $table->string('name')->nullable(false);
            $table->string('lastname')->nullable(false);
            $table->string('email')->unique();
            $table->boolean('student')->default(false);
            $table->timestamps();
            $table->string('password')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
