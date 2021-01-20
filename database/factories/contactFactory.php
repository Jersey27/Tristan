<?php

namespace Database\Factories;

use App\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class contactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'society' => $this->faker->company(),
            'mail' => $this->faker->email(),
            'subject' => 'hello',
            'message' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'unread' => true
        ];
    }
}
