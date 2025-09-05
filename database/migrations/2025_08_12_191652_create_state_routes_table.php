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
        Schema::create('state_routes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_state_id');
            $table->unsignedBigInteger('to_state_id');
            $table->string('title')->nullable();
            $table->string('slug')->unique();
            $table->decimal('min_cost', 10, 2)->nullable();
            $table->decimal('max_cost', 10, 2)->nullable();
            $table->integer('miles')->nullable();
            $table->timestamps();
            $table->foreign('from_state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('to_state_id')->references('id')->on('states')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('state_routes');
    }
};
