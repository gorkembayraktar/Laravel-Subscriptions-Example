<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            "title" => 'Aylık',
            "slug" => "monthly",
            "stripe_id" => "price_1OrGHM2KQAZdjyGbHI7pue7y",
            "price" => 10,
            "description" => "Aylık paket"
        ]);
        Plan::create([
            "title" => 'Yıllık',
            "slug" => "yearly",
            "stripe_id" => "price_1OrGHM2KQAZdjyGbnVAw3Wmy",
            "price" => 100,
            "description" => "Yıllık paket"
        ]);
    }
}
