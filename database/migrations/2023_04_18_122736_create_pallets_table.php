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
        Schema::create('pallets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('SSCC')->unique();
            // $table->string('pallet_id')->nullable();

            $table->date('datefab');
            $table->date('DLC');
            // $table->integer('quantiteplt');
            $table->timestamps();
            $table->foreignId('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('priting_id')->references('id')->on('pritings')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pallets');
    }
};
