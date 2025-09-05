<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('top_movers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('page')->nullable();
            $table->string('heading')->nullable();
            $table->string('phone')->nullable();
            $table->integer('position')->default(0);
            $table->string('point_one')->nullable();
            $table->string('point_two')->nullable();
            $table->string('point_three')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }
    public function down(): void {
        Schema::dropIfExists('top_movers');
    }
};
