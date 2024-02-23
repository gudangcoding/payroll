<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Employee;
use App\Models\sallary;

class SallaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sallary::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'Employee_id' => Employee::factory(),
            'amount' => $this->faker->randomFloat(0, 0, 9999999999.),
            'effective_date' => $this->faker->date(),
        ];
    }
}
