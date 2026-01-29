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
        Schema::create('price_standards', function (Blueprint $table) {
            $table->id();
            $table->string('mutu');
            $table->string('thickness')->nullable();
            $table->integer('price');
            $table->string('unit');
            $table->timestamps();

            $table->unique(
                ['mutu', 'thickness', 'unit'],
                'ps_unique'
            );
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_standards');
    }
};
