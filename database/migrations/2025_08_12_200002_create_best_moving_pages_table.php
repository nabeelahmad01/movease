<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('best_moving_pages', function (Blueprint $table) {
            $table->id();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('page_name');
            $table->string('slug')->unique();
            $table->longText('navbar_content')->nullable();
            $table->longText('upper_content')->nullable();
            $table->longText('review_content')->nullable();
            $table->longText('lower_content')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('best_moving_pages');
    }
};
