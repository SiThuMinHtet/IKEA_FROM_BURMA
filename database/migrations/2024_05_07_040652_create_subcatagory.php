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
        Schema::create('subcategory', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->references('id')->on('staffs')->cascadeOnDelete()->cascadeOnUpdate()->constrained();
            $table->string('name');
            $table->foreignId('catagory_id')->references('id')->on('staffs')->cascadeOnDelete()->cascadeOnUpdate()->constrained();
            $table->string('status');
            $table->string('uuid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcatagory');
    }
};
