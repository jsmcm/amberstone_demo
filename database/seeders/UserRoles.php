<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class UserRoles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roles = [
            "System Administrator",
            "Purchasing Manager",
            "Field Sales Associate"
        ];

        foreach ($roles as $role) {
            UserRole::firstOrCreate([
                "role" => $role
            ]);
        }

    }
}
