<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tours\Tour;
use App\Models\Tours\TourInfo;
use App\Models\Tag;

class TourFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tour::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $price = $this->faker->numberBetween(1000, 100000);

        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text(),
            'image_path' => 'https://cdn.pixabay.com/photo/2015/12/01/20/28/road-1072823_960_720.jpg',
            'price' => $price,
            'discount_price' => $this->faker->randomElement([null, $this->faker->numberBetween(1000, $price)])
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Tour $tour) {
            TourInfo::factory()->create([
                'tour_id' => $tour->id
            ]);

            $count = rand(1, 5);
            $tags = Tag::get();

            for ($i = 0; $i < $count; $i++)
            {
                $random_tag = $this->faker->randomElement($tags);
                $tour->tags()-> attach($random_tag);
            }
        });
    }
}
