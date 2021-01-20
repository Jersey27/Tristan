<?php

namespace Database\Factories;

use App\langage;
use Illuminate\Database\Eloquent\Factories\Factory;

class langageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = langage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->sentence($nbWords = 5),
            'description' => $this->faker->paragraph($nbSentences = 3),
            'visible' => true
        ];
    }
}
