<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    public function run()
    {
        Plan::create([
            'name' => 'START',
            'slug' => 'start',
            'price' => 0,
            'level' => 1,
            'type' => 0,
        ]);

        Plan::create([
            'name' => 'SMART',
            'slug' => 'smart',
            'price' => 4.99,
            'level' => 2,
            'type' => 0,
        ]);

        Plan::create([
            'name' => 'PREMIUM',
            'slug' => 'premium',
            'price' => 12.99,
            'level' => 3,
            'type' => 0,
        ]);
    }
}
