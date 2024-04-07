<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Image;
use App\Models\Doctor;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'filename' =>  $this->faker->randomElement(['1.jpg', '20.jpg', '6.jpg', 'card4.png']),
            'imageable_id' => Doctor::all()->random()->id,
            'imageable_type' => 'App\Models\Doctor',
        ];
    }
}
