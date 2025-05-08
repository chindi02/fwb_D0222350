<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pembayaran extends Seeder
{
  
    public function run(): void
    {
        // roles
        DB::table('roles')->insert([
            ['nama_role' => 'penghuni'],
            ['nama_role' => 'pengurus'],
            ['nama_role' => 'pengawas'],
        ]);

        // users
        DB::table('user')->insert([
            [
                'nama' => 'Penghuni',
                'email' => 'chici@gmail.com',
                'password' => '654',
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pengurus',
                'email' => 'afni@gmail.com',
                'password' => '123',
                'role_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pengawas',
                'email' => 'bilqis1@gmail.com',
                'password' => '543',
                'role_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // tagihan untuk penghuni
        DB::table('tagihan')->insert([
            [
                'user_id' => 1,
                'tanggal' => '2025-05-01',
                'jumlah' => 250000,
                'status' => 'belum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // pembayaran 
        DB::table('pembayaran')->insert([
            [
                'tagihan_id' => 1,
                'tanggal_bayar' => '2025-05-02',
                'jumlah_dibayar' => 250000,
                'bukti_transfer' => 'bukti_transfer.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

   
