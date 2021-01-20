<?php

namespace Database\Factories;

use App\experience;
use Illuminate\Database\Eloquent\Factories\Factory;

class experienceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = experience::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->sentence($nbWords = 5),
            'date' => '20XX-20XX',
            'company' => $this->faker->company,
            'description' => $this->faker->paragraph($nbSentences = 3),
            'visible' => true,
            'place' => 0
        ];
    }
}
