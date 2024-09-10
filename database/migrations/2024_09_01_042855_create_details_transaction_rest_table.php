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
        Schema::create('details_transaction_rest', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dishes_categories_id')->constrained();
            $table->foreignId('registered_dishes_id')->constrained();
            $table->decimal('registered_dishes_price');
            $table->decimal('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details_transaction_rest');
    }
};
