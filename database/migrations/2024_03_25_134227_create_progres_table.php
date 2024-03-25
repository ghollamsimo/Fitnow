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
        Schema::create('progres', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->float('weight')->nullable();
            $table->float('height')->nullable();
            $table->float('chest')->nullable();
            $table->float('waist')->nullable();
            $table->float('hips')->nullable();
            $table->string('performance')->nullable();
            $table->string('status')->default('Non terminé');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progres');
    }
};
