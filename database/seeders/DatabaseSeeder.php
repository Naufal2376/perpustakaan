<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('kategori')->insert([
            'kategori_id' => 1,
            'nama' => 'fiksi',
        ]);

        DB::table('users')->insert([
            'id' => 1,
            'nama' => 'naufal',
            'email' => 'naufal@gmail.com',
            'password' => Hash::make('naufal'),
            'telp' => '083146867066',
            'alamat' => 'sekayu',
            'level' => 'user'
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'nama' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('petugas'),
            'telp' => '083146867066',
            'alamat' => 'sekayu',
            'level' => 'petugas'
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'telp' => '083146867066',
            'alamat' => 'sekayu',
            'level' => 'admin'
        ]);
    }
}