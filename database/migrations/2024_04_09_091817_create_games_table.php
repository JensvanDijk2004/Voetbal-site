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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('time');
            $table->integer('home_score');
            $table->integer('away_score');
            $table->unsignedBigInteger('home_team')->nullable();
            $table->foreign('home_team')->references('id')->on('teams')->onDelete('cascade');
            $table->unsignedBigInteger('away_team')->nullable();
            $table->foreign('away_team')->references('id')->on('teams')->onDelete('cascade');
            $table->integer('field');
            $table->unsignedBigInteger('referee')->nullable();
            $table->foreign('referee')->references('id')->on('users')->onDelete('cascade');
            $table->integer('played')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
