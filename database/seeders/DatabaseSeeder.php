<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tours\Tour;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SeasonsSeeder::class,
            ComplexitiesSeeder::class
        ]);


        DB::table('tours')->delete();
        Tour::factory()->count(6)->create();
    }
}
