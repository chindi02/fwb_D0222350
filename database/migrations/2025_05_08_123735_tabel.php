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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nama_role'); // penghuni, pengurus, pengawas
            $table->timestamps();
        });

        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('role_id')->constrained('roles');
            $table->timestamps();
        });

        Schema::create('tagihan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('user'); // Penghuni
            $table->date('tanggal'); // contoh: 2025-05-01
            $table->decimal('jumlah', 10, 2);
            $table->enum('status', ['belum', 'lunas'])->default('belum');
            $table->timestamps();
        });
        
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tagihan_id')->constrained('tagihan');
            $table->date('tanggal_bayar');
            $table->decimal('jumlah_dibayar', 10, 2);
            $table->string('bukti_transfer')->nullable(); // opsional file upload
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('user');
        Schema::dropIfExists('tagihan');
        Schema::dropIfExists('pembayaran');
    }
};
