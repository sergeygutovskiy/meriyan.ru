<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seasons')->delete();

        DB::table('seasons')->insert([ 'name' => 'зима',  'image_path' => '' ]);
        DB::table('seasons')->insert([ 'name' => 'весна', 'image_path' => '' ]);
        DB::table('seasons')->insert([ 'name' => 'лето',  'image_path' => '' ]);
        DB::table('seasons')->insert([ 'name' => 'осень', 'image_path' => '' ]);
    }
}
