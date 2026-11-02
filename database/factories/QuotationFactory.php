<?php

namespace Database\Factories;

use App\Models\Lead;
use App\Models\Quotation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Quotation> */
class QuotationFactory extends Factory
{
    protected $model = Quotation::class;

    public function definition(): array
    {
        return [
            'lead_id' => Lead::factory(),
            'version' => 1,
            'status' => Quotation::STATUS_DRAFT,
            'description' => fake()->sentence(),
            'total' => fake()->randomFloat(2, 100000, 50000000),
            'created_by' => User::factory(),
        ];
    }

    public function sent(): static
    {
        return $this->state(fn () => [
            'status' => Quotation::STATUS_SENT,
            'sent_at' => now(),
        ]);
    }
}
