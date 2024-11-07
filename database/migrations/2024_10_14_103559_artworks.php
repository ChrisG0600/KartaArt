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
        //
        Schema::create('artworks', function (Blueprint $table) {
            $table->id();
            $table->string('artwork_title');
            $table->text('artwork_description');
            $table->string('artwork_medium');
            $table->string('artwork_size');
            $table->integer('artwork_price');
            $table->string('image');
            $table->boolean('for_sale')->default(false);
            $table->foreignId('artist_name')->constrained('sellers')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artworks');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
