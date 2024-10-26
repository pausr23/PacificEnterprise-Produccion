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
        Schema::create('registered_dishes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dishes_categories_id')->constrained();
            $table->foreignId('subcategories_id')->constrained();
            $table->string('title');
            $table->string('description');
            $table->decimal('purchase_price');
            $table->decimal('sale_price');
            $table->integer('units')->default(0); 
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registered_dishes');
    }
};
