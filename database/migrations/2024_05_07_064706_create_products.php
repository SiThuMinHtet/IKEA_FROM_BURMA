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
            $table->foreignId('subcategory_id')->references('id')->on('subcategory')->cascadeOnDelete()->cascadeOnUpdate()->constrained();
            $table->foreignId('staff_id')->references('id')->on('staffs')->cascadeOnDelete()->cascadeOnUpdate()->constrained();
            $table->string('detail');
            $table->string('code_name');
            $table->float('price');
            $table->integer('stock');
            $table->string('description');
            $table->string('feature');
            $table->string('additionalinfo');
            $table->string('uuid');
            $table->string('status');
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
