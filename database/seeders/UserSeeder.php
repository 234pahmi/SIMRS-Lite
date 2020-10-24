<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role' => 'Dokter',
            'name' => 'Dokter 1',
            'email' => 'dokter1@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('dokter1@gmail.com'), //password dari nik dokter,
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'role' => 'Dokter',
            'name' => 'Dokter 2',
            'email' => 'dokter2@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('dokter2@gmail.com'), //password dari nik dokter,
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'role' => 'Dokter',
            'name' => 'Dokter 3',
            'email' => 'dokter3@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('dokter3@gmail.com'), //password dari nik dokter,
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'role' => 'Admin',
            'name' => 'Admin 1',
            'email' => 'admin1@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin1@gmail.com'), //password dari email admin,
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'role' => 'Admin',
            'name' => 'Admin 2',
            'email' => 'admin2@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin2@gmail.com'), //password dari email admin,
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
