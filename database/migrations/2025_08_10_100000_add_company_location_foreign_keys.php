<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('companies', function (Blueprint $table) {
            if (!Schema::hasColumn('companies','state_id')) return; // safety
            $table->foreign('state_id')->references('id')->on('states')->onDelete('set null');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
        });
    }
    public function down(): void {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign(['state_id']);
            $table->dropForeign(['country_id']);
        });
    }
};
