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
        DB::table('kategori')->insert([
            'kategori_id' => 2,
            'nama' => 'horor',
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
        DB::table('buku')->insert([
            'buku_id' => 1,
            'kode_buku' => 12345,
            'judul' => 'hello world',
            'penulis' => 'naufal',
            'penerbit' => 'gramedia',
            'tahun_terbit' => '2024',
            'kategori_id' => 1
        ]);
        DB::table('buku')->insert([
            'buku_id' => 2,
            'kode_buku' => 123456,
            'judul' => 'munafiq',
            'penulis' => 'nextri',
            'penerbit' => 'pancaroba',
            'tahun_terbit' => '2024',
            'kategori_id' => 2
        ]);
    }
}