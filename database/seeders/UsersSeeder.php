<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            "role" => "System Administrator",
            "password" => "admin",
            "email" => "admin@example.com",
        ]);

        User::factory()->create([
            "role" => "Purchasing Manager",
            "password" => "manager",
            "email" => "manager@example.com",
        ]);

        User::factory()->create([
            "role" => "Field Sales Associate",
            "password" => "sales",
            "email" => "sales@example.com",
        ]);
    }
}
