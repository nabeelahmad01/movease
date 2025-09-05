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
        Schema::table('companies', function (Blueprint $table) {
            $table->string('dot_number')->nullable()->after('logo');
            $table->string('mc_number')->nullable()->after('dot_number');
            $table->string('license_number')->nullable()->after('mc_number');
            $table->enum('service_type', ['local','long_distance'])->default('local')->after('license_number');
            $table->boolean('is_active')->default(true)->after('service_type');
            $table->boolean('is_claimed')->default(false)->after('is_active');
            $table->unsignedBigInteger('claimed_by_user_id')->nullable()->after('is_claimed');
            $table->foreign('claimed_by_user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign(['claimed_by_user_id']);
            $table->dropColumn(['dot_number','mc_number','license_number','service_type','is_active','is_claimed','claimed_by_user_id']);
        });
    }
};
