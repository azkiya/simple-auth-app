<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nip' => '1234',
                'nama' => 'Doni',
                'jabatan' => 'Direktur',
                'password' => Hash::make('123456'),
                'created_at' => now()
            ],
            [
                'nip' => '1235',
                'nama' => 'Dono',
                'jabatan' => 'Finance',
                'password' => Hash::make('123456'),
                'created_at' => now()
            ],
            [
                'nip' => '1236',
                'nama' => 'Dona',
                'jabatan' => 'Staff',
                'password' => Hash::make('123456'),
                'created_at' => now()
            ],
        ]);
    }
}
