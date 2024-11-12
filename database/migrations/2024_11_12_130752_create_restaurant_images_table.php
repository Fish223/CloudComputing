<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('restaurant_images', function (Blueprint $table) {
        $table->id();
        $table->foreignId('restaurant_id')->constrained()->onDelete('cascade'); // FK to restaurants
        $table->string('image_path'); // Path ke gambar yang disimpan di Amazon S3 atau lokal
        $table->string('caption')->nullable(); // Caption gambar, opsional
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_images');
    }
};
