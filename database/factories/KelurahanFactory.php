<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Generator as Faker;

class KelurahanFactory extends Factory
{
    public function definition()
    {
        return [
            'kelurahan' => $this->faker->village,
            'kecamatan' => $this->faker->district,
            'kota' => $this->faker->city
        ];
    }
}
