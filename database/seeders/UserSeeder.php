<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guru = User::create([
            'name' => 'Guru',
            'email' => 'guru@gmail.com',
            'password' => bcrypt('guru123'),
        ]);
        $guru->assignRole('guru');

        $murid = User::create([
            'name' => 'Murid',
            'email' => 'murid@gmail.com',
            'password' => bcrypt('murid123'),
        ]);
        $murid->assignRole('murid');
    }
}
