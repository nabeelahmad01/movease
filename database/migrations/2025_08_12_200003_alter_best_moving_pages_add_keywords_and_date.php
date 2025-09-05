<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('best_moving_pages', function (Blueprint $table) {
            if (!Schema::hasColumn('best_moving_pages','meta_keywords')) {
                $table->string('meta_keywords')->nullable()->after('meta_description');
            }
            if (!Schema::hasColumn('best_moving_pages','published_at')) {
                $table->timestamp('published_at')->nullable()->after('slug');
            }
        });
    }
    public function down(): void {
        Schema::table('best_moving_pages', function (Blueprint $table) {
            if (Schema::hasColumn('best_moving_pages','meta_keywords')) {
                $table->dropColumn('meta_keywords');
            }
            if (Schema::hasColumn('best_moving_pages','published_at')) {
                $table->dropColumn('published_at');
            }
        });
    }
};
