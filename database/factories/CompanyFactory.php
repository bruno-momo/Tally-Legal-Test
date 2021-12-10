<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $companyname = $this->faker->company();
        $companywebsite = str_replace(' ', '-', $companyname);
        $companywebsite = str_replace('.', '', $companywebsite);
        $companywebsite = str_replace(',', '', $companywebsite);
        $companywebsite = strtolower($companywebsite);
        $companywebsite = $companywebsite.'.com';
        return [
            'companyname' => $companyname,
            'companybs' => $this->faker->bs(),
            'website' => $companywebsite
        ];
    }
}
