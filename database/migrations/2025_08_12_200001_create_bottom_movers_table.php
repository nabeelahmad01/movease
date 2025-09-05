<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('bottom_movers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('page')->nullable();
            $table->string('heading')->nullable();
            $table->string('availability')->nullable();
            $table->string('position')->nullable();
            $table->boolean('deposit_required')->default(false);
            $table->string('point_one')->nullable();
            $table->string('point_two')->nullable();
            $table->string('point_three')->nullable();
            $table->longText('content')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }
    public function down(): void {
        Schema::dropIfExists('bottom_movers');
    }
};
