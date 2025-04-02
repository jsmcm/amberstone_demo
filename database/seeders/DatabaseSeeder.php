<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $products = [
            [
                "code"          => "FR-001a",
                "description"   => "Citrusdal Oranges - Grade",
                "prices"        => [
                    2023 => 125.50,
                    2024 => 135.50,
                    2025 => 150.90
                ]
            ],
            [
                "code"          => "FR-001b",
                "description"   => "Citrusdal Oranges - Grade B",
                "prices"        => [
                    2023 => 136.75,
                    2024 => 148.75,
                    2025 => 195.00
                ]
            ],
            [
                "code"          => "FR-002",
                "description"   => "Citrusdal Limes",
                "prices"        => [
                    2023 => 131.50,
                    2024 => 151.95,
                    2025 => 165.00
                ]
            ],
            [
                "code"          => "FR-003",
                "description"   => "Citrusdal Grapefruit - Grade 1",
                "prices"        => [
                    2023 => 109.50,
                    2024 => 132.50,
                    2025 => 141.00
                ]
            ],
            [
                "code"          => "FR-004",
                "description"   => "Citrusdal Lemons - Grade 1",
                "prices"        => [
                    2023 => 99.25,
                    2024 => 120.50,
                    2025 => 159.00
                ]
            ],
            [
                "code"          => "GT01",
                "description"   => "Grahamstown Oranges - Type A",
                "prices"        => [
                    2023 => 98.50,
                    2024 => 101.45,
                    2025 => 115.60
                ]
            ],
            [
                "code"          => "GT02",
                "description"   => "Grahamstown Oranges - Type B",
                "prices"        => [
                    2023 => 97.60,
                    2024 => 103.65,
                    2025 => 123.50
                ]
            ],
        ];


        foreach ($products as $product) {
            $newProduct = Product::create([
                "code"          => $product["code"],
                "description"   => $product["description"]
            ]);

            foreach ($product["prices"] as $key => $value) {
                ProductPrice::create([
                    "product_id"    => $newProduct->id,
                    "year"          => $key,
                    "cost_per_kg"   => $value
                ]);
            }
        }

        $this->call(UserRoles::class);
    }
}
