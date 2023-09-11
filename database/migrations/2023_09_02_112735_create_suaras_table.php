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
        Schema::create('suara', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paslon_id');
            $table->integer('jumlah_suara')->default(0);
            $table->unsignedBigInteger('tps_id')->default(0);
            $table->timestamps();
            $table->foreign('paslon_id')->references('id')->on('paslon')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suara');
    }
};
