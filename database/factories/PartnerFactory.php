<?php

namespace Database\Factories;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartnerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstname(),
            'lastname' => $this->faker->lastName(),
            'company_id' => $this->faker->unique()->numberBetween($min = 1, $max = 15),
            'email' => $this->faker->unique()->companyEmail(),
            'address' => $this->faker->address(),
            'phonenumber' => $this->faker->numerify('########')
        ];
    }
}
