<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "nombre" => "admin",
            "email" => "admin@admin.com",
            "telefono" => 694420542,
            "username" => "ADMIN",
            "password" => bcrypt("1234"),
            "rol" => "admin",
        ]);
    }
}
