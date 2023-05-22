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
        Schema::create('productions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('dateprod');
            $table->string('production_id')->nullable();

            $table->enum('equipe', ['A', 'B', 'C', 'D']);
            $table->enum('quart',['matin','soir','nuit']);
            $table->foreignId('structure_id')->references('id')->on('structures')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('line_id')->references('id')->on('lines')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            // $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productions');
    }
};
