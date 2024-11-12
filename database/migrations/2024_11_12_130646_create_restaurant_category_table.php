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
    Schema::create('restaurant_category', function (Blueprint $table) {
        $table->foreignId('restaurant_id')->constrained()->onDelete('cascade');
        $table->foreignId('category_id')->constrained()->onDelete('cascade');
        $table->primary(['restaurant_id', 'category_id']);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_category');
    }
};
