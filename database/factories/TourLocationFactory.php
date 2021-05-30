<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tours\TourLocation;

class TourLocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TourLocation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $is_big = rand(0, 1) ? true : false;

        $description = null;
        if ($is_big)
        {
            $description = '<p>';
            $description .= $this->faker->text();
            $description .= '</p>';            
        } else 
        {
            $description = '<ul>';

            for ($i = 0; $i < rand(1, 5); $i++)
            {
                $description .= '<li>';
                $description .= $this->faker->text(40);
                $description .= '</li>';
            }

            $description .= '</ul>';
        }

        return [
            'name' => $this->faker->name(),
            'image_path' => 'https://cdn.pixabay.com/photo/2015/12/01/20/28/road-1072823_960_720.jpg',
            'description' => $description,
            'is_big' => $is_big
        ];
    }
}
