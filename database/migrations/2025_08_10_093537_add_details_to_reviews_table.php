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
        Schema::table('reviews', function (Blueprint $table) {
            $table->string('move_size')->nullable()->after('comment');
            $table->date('move_date')->nullable()->after('move_size');
            $table->unsignedBigInteger('pickup_state_id')->nullable()->after('move_date');
            $table->string('pickup_city')->nullable()->after('pickup_state_id');
            $table->unsignedBigInteger('delivery_state_id')->nullable()->after('pickup_city');
            $table->string('delivery_city')->nullable()->after('delivery_state_id');
            $table->string('image1')->nullable()->after('delivery_city');
            $table->string('image2')->nullable()->after('image1');
            $table->string('image3')->nullable()->after('image2');
            $table->foreign('pickup_state_id')->references('id')->on('states')->onDelete('set null');
            $table->foreign('delivery_state_id')->references('id')->on('states')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['pickup_state_id']);
            $table->dropForeign(['delivery_state_id']);
            $table->dropColumn(['move_size','move_date','pickup_state_id','pickup_city','delivery_state_id','delivery_city','image1','image2','image3']);
        });
    }
};
