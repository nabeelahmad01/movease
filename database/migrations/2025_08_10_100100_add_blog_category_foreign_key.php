<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('blogs', function (Blueprint $table) {
            if (!Schema::hasColumn('blogs','category_id')) return;
            $table->foreign('category_id')->references('id')->on('blog_categories')->onDelete('set null');
        });
    }
    public function down(): void {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
    }
};
