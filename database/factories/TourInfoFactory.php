<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Complexity;
use App\Models\Season;
use App\Models\Tours\TourInfo;
use App\Models\Tours\TourLocation;
use App\Models\Tours\TourService;

class TourInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TourInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'duration' => $this->faker->numberBetween(1, 31),
            'people_amount' => $this->faker->numberBetween(1, 14),
            'description' => $this->faker->text(),
            'video_path' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'season_id' => $this->faker->randomElement(Season::get()),
            'complexity_id' => $this->faker->randomElement(Complexity::get())
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (TourInfo $info) {
            TourLocation::factory()->count(rand(2, 6))->create([
                'tour_info_id' => $info->id
            ]);

            TourService::factory()->count(rand(6, 10))->create([
                'tour_info_id' => $info->id
            ]);
        });
    }
}
