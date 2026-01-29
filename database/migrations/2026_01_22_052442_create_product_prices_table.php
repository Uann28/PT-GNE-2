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
        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('product_type_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('price_standard_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(
                ['product_id', 'product_type_id', 'price_standard_id'],
                'pp_unique'
            );
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_prices');
    }
};
