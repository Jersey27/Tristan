<?php

namespace Database\Factories;

use App\competence;
use Illuminate\Database\Eloquent\Factories\Factory;

class competenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = competence::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->sentence($nbWords=3),
            'description' => $this->faker->paragraph($nbSentences=4),
            'visible' => true
        ];
    }
}
