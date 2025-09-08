<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_mover_leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->string('zip_from')->nullable();
            $table->string('zip_to')->nullable();
            $table->date('move_date')->nullable();
            $table->string('move_size')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->json('services')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_mover_leads');
    }
};
