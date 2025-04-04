<?php

namespace Database\Seeders;

use App\Models\Business;
use App\Models\BusinessContact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($x = 0; $x <= 100; $x++) {
            $business = Business::factory()->create();

            BusinessContact::factory(5)->create(["business_id" => $business->id, "is_primary" => false]);
            BusinessContact::factory(5)->create(["business_id" => $business->id, "is_primary" => true, "type" => "sales"]);
            BusinessContact::factory(5)->create(["business_id" => $business->id, "is_primary" => true, "type" => "logistics"]);
        }
        
    }
}
