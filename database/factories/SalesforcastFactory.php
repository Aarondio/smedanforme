<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Salesforcast;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalesforcastFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Salesforcast::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jan_price' => $this->faker->randomNumber(2),
            'feb_price' => $this->faker->randomNumber(2),
            'mar_price' => $this->faker->randomNumber(2),
            'aprile_price' => $this->faker->randomNumber(2),
            'may_price' => $this->faker->randomNumber(2),
            'jun_price' => $this->faker->randomNumber(2),
            'jul_price' => $this->faker->randomNumber(2),
            'aug_price' => $this->faker->randomNumber(2),
            'sep_price' => $this->faker->randomNumber(2),
            'oct_price' => $this->faker->randomNumber(2),
            'nov_price' => $this->faker->randomNumber(2),
            'dec_price' => $this->faker->randomNumber(2),
            'jan_qty' => $this->faker->randomNumber(),
            'feb_qty' => $this->faker->randomNumber(),
            'mar_qty' => $this->faker->randomNumber(),
            'apr_qty' => $this->faker->randomNumber(),
            'may_qty' => $this->faker->randomNumber(),
            'jun_qty' => $this->faker->randomNumber(),
            'jul_qty' => $this->faker->randomNumber(),
            'aug_qty' => $this->faker->randomNumber(),
            'sep_qty' => $this->faker->randomNumber(),
            'oct_qty' => $this->faker->randomNumber(),
            'nov_qty' => $this->faker->randomNumber(),
            'dec_qty' => $this->faker->randomNumber(),
            'jan_cost' => $this->faker->randomNumber(2),
            'feb_cost' => $this->faker->randomNumber(2),
            'mar_cost' => $this->faker->randomNumber(2),
            'apr_cost' => $this->faker->randomNumber(2),
            'may_cost' => $this->faker->randomNumber(2),
            'jun_cost' => $this->faker->randomNumber(2),
            'jul_cost' => $this->faker->randomNumber(2),
            'aug_cost' => $this->faker->randomNumber(2),
            'sep_cost' => $this->faker->randomNumber(2),
            'oct_cost' => $this->faker->randomNumber(2),
            'nov_cost' => $this->faker->randomNumber(2),
            'dec_cost' => $this->faker->randomNumber(2),
            'product_id' => \App\Models\Product::factory(),
        ];
    }
}
