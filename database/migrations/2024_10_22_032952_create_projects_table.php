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
        Schema::create('projects', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('image');
            $table->string('title');
            $table->text('description');
            $table->decimal('target_amount', 15, 2); // Target penggalangan dana
            $table->decimal('collected_amount', 15, 2)->default(0); // Jumlah dana terkumpul
            $table->boolean('is_active')->default(true); // Status project aktif atau tidak
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
