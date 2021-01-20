<?php

namespace Database\Factories;

use App\information;
use Illuminate\Database\Eloquent\Factories\Factory;

class InformationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = information::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'key' => 'aboutme',
            'data' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true)
        ];
    }
}