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
        Schema::create('u_r_l_s', function (Blueprint $table) {
            $table->id();
            $table->string('destination'); // Long URL
            $table->string('slug')->unique(); // Shortened URL slug
            $table->unsignedInteger('views')->default(0); // Number of times the link has been opened
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('u_r_l_s');
    }
};
