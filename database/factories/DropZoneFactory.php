<?php

namespace Database\Factories;

use App\Models\DropZone;
use Illuminate\Database\Eloquent\Factories\Factory;

class DropZoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DropZone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'     => $this->faker->sentence($nbWords = 4, $variableNbWords = true),
            'slug'      =>$this->faker->slug(),
            'body'      => $this->faker->text($maxNbChars = 200),
            'images'    => '',
        ];
    }
}
