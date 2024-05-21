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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('code_id')->references('id')->on('codes')->cascadeOnDelete()->cascadeOnUpdate()->constrained();
            $table->foreignId('supplier_id')->references('id')->on('suppliers')->cascadeOnDelete()->cascadeOnUpdate()->constrained();
            $table->foreignId('category_id')->references('id')->on('category')->cascadeOnDelete()->cascadeOnUpdate()->constrained();
            $table->foreignId('staff_id')->references('id')->on('staffs')->cascadeOnDelete()->cascadeOnUpdate()->constrained();
            $table->string('detail')->nullable();
            $table->string('code_name');
            $table->float('price');
            $table->integer('stock');
            $table->string('description');
            $table->string('feature')->nullable();
            $table->string('additionalinfo')->nullable();
            $table->string('uuid');
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
