<?php

namespace Database\Factories;

use App\Models\DoctorCode;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Uuid as Faker;

class DoctorCodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DoctorCode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => Faker::uuid(),
        ];
    }
}
