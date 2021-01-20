<?php

namespace Database\Factories;

use App\formation;
use Illuminate\Database\Eloquent\Factories\Factory;

class formationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = formation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->sentence($nbWords = 3),
            'date' => '20XX-20XX',
            'description' => $this->faker->paragraph($nbSentences = 1),
            'visible' => true
        ];
    }
}
