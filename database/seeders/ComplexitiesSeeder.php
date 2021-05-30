<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComplexitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('complexities')->delete();

        DB::table('complexities')->insert([ 'name' => 'легко' ]);
        DB::table('complexities')->insert([ 'name' => 'нормально' ]);
        DB::table('complexities')->insert([ 'name' => 'тяжело' ]);
    }
}
