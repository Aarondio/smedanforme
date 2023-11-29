<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Businessinfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class BusinessinfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Businessinfo::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'business_name' => $this->faker->text(255),
            'audience_need' => $this->faker->text(),
            'business_model' => $this->faker->text(),
            'target_market' => $this->faker->text(),
            'competition_ad' => $this->faker->text(),
            'management_team' => $this->faker->text(),
            'loan_amount' => $this->faker->randomNumber(),
            'loan_reason' => $this->faker->text(255),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
