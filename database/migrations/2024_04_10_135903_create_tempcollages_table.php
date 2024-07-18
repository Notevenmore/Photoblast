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
        Schema::create('tempcollages', function (Blueprint $table) {
            $table->id();
            $table->string('src');
            $table->integer('x');
            $table->integer('y');
            $table->float('width');
            $table->float('height');
            $table->float('margin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tempcollages');
    }
};
