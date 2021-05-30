<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tours\TourService;

class TourServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TourService::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $is_paragraph = rand(0, 1) ? true : false;
    
        $description = null;
        if ($is_paragraph)
        {
            $description = '<p>';
            $description .= $this->faker->text(60);
            $description .= '</p>';            
        } else 
        {
            $description = '<ul>';

            for ($i = 0; $i < rand(1, 4); $i++)
            {
                $description .= '<li>';
                $description .= $this->faker->text(40);
                $description .= '</li>';
            }

            $description .= '</ul>';
        }

        return [
            'description' => $description,
            'is_included_in_price' => rand(0, 1)
        ];
    }
}
