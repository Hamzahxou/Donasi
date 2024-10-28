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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('bank_account_name')->nullable(); // nama akun bank
            $table->decimal('amount', 15, 2); // Jumlah donasi
            $table->boolean('is_verified')->default(false); // Status verifikasi manual
            $table->string('payment_method')->default('transfer bank'); // Metode pembayaran manual (contoh: transfer bank)
            $table->string('image'); // Bukti pembayaran, bisa berupa URL gambar
            $table->text('message')->nullable(); // Status konfirmasi admin
            $table->foreignId('user_id')->constrained()->onDelete('restrict');
            $table->foreignUuid('project_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
