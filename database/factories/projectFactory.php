<?php

namespace Database\Factories;

use App\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class projectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->sentences($nbWords = 3, $variableNbWords = true),
            'short_description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'visible' => true
        ];
    }
}
