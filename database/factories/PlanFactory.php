<?php

namespace Database\Factories;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PlanFactory extends Factory
{
    protected $model = Plan::class;

    public function definition()
    {
        return [
            'slug' => $this->faker->slug(),
            'name' => $this->faker->name(),
            'level' => $this->faker->randomNumber(),
            'price' => $this->faker->randomFloat(),
            'type' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
