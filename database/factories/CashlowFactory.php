<?php

namespace Database\Factories;

use App\Models\Cashlow;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CashlowFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cashlow::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'directin_one' => $this->faker->randomNumber(),
            'directin_two' => $this->faker->randomNumber(),
            'directin_three' => $this->faker->randomNumber(),
            'directin_four' => $this->faker->randomNumber(),
            'indirectin_one' => $this->faker->randomNumber(),
            'indirectin_two' => $this->faker->randomNumber(),
            'indirectin_three' => $this->faker->randomNumber(),
            'indirectin_four' => $this->faker->randomNumber(),
            'wages_one' => $this->faker->randomNumber(),
            'wages_two' => $this->faker->randomNumber(),
            'wages_three' => $this->faker->randomNumber(),
            'wages_four' => $this->faker->randomNumber(),
            'capitalcost_one' => $this->faker->randomNumber(),
            'capitalcost_two' => $this->faker->randomNumber(),
            'capitalcost_three' => $this->faker->randomNumber(),
            'capitalcost_four' => $this->faker->randomNumber(),
            'businessinfo_id' => \App\Models\Businessinfo::factory(),
        ];
    }
}
