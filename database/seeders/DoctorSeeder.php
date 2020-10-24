<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert([
            'role' => 'Dokter',
            'user_id' => 1,
            'polyclinic_id' => 1,
            'name' => 'Dokter 1',
            'email' => 'dokter1@gmail.com',
            'nik' => '1234567899',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('doctors')->insert([
            'role' => 'Dokter',
            'user_id' => 2,
            'polyclinic_id' => 2,
            'name' => 'Dokter 2',
            'email' => 'dokter2@gmail.com',
            'nik' => '987654321',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('doctors')->insert([
            'role' => 'Dokter',
            'user_id' => 3,
            'polyclinic_id' => 3,
            'name' => 'Dokter 3',
            'email' => 'dokter3@gmail.com',
            'nik' => '999999999',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
