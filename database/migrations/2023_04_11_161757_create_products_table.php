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
            // $table->unsignedInteger('line_id');
            $table->string('code')->unique();
            $table->text('description');
            $table->Integer('DLUO');
            $table->timestamps();
            // $table->foreign('line_id')->references('id')->on('lines')->onDelete('restrict');


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
