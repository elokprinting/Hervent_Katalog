<?php

namespace Database\Factories;

use App\Models\BusinessUnit;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Lead> */
class LeadFactory extends Factory
{
    protected $model = Lead::class;

    public function definition(): array
    {
        return [
            'business_unit_id' => BusinessUnit::factory(),
            'customer_name' => fake()->company(),
            'customer_email' => fake()->safeEmail(),
            'customer_phone' => fake()->phoneNumber(),
            'product_description' => fake()->words(3, true),
            'quantity' => fake()->numberBetween(1, 100),
            'deadline' => now()->addWeek()->toDateString(),
            'pic_user_id' => User::factory(),
            'created_by' => User::factory(),
        ];
    }
}
