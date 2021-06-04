<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->delete();

        $desc = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti, excepturi." . 
            "Corporis optio culpa beatae facilis sit alias aut ratione dolores nemo temporibus eos, neque fuga praesentium.";

        DB::table('tags')->insert(
            [ 'name' => 'Новогодний', 'description' => $desc, 'image_path' => '/images/storage/tags/icons/1.svg' ]
        );
        DB::table('tags')->insert(
            [ 'name' => 'Экскурсионный', 'description' => $desc, 'image_path' => '/images/storage/tags/icons/2.svg' ]
        );
        DB::table('tags')->insert(
            [ 'name' => 'Авторский', 'description' => $desc, 'image_path' => '/images/storage/tags/icons/3.svg' ]
        );
        DB::table('tags')->insert(
            [ 'name' => 'Семейный', 'description' =>$desc, 'image_path' => '/images/storage/tags/icons/4.svg' ]
        );
        DB::table('tags')->insert(
            [ 'name' => 'Йога-тур', 'description' => $desc, 'image_path' => '/images/storage/tags/icons/5.svg' ]
        );
        DB::table('tags')->insert(
            [ 'name' => 'Экстрим', 'description' =>$desc, 'image_path' => '/images/storage/tags/icons/6.svg' ]
        );
        DB::table('tags')->insert(
            [ 'name' => 'Горнолыжный', 'description' => $desc, 'image_path' => '/images/storage/tags/icons/7.svg' ]
        );
        DB::table('tags')->insert(
            [ 'name' => 'Сплав', 'description' => $desc, 'image_path' => '/images/storage/tags/icons/8.svg' ]
        );
        DB::table('tags')->insert(
            [ 'name' => 'Джип-тур', 'description' => $desc, 'image_path' => '/images/storage/tags/icons/9.svg' ]
        );
        DB::table('tags')->insert(
            [ 'name' => 'В горы', 'description' => $desc, 'image_path' => '/images/storage/tags/icons/10.svg' ]
        );
        DB::table('tags')->insert(
            [ 'name' => 'На море', 'description' => $desc, 'image_path' => '/images/storage/tags/icons/11.svg' ]
        );
        DB::table('tags')->insert(
            [ 'name' => 'Гастрономический', 'description' => $desc, 'image_path' => '/images/storage/tags/icons/12.svg' ]
        );
        DB::table('tags')->insert(
            [ 'name' => 'Экспедиция', 'description' => $desc, 'image_path' => '/images/storage/tags/icons/13.svg' ]
        );
        DB::table('tags')->insert(
            [ 'name' => 'Треккинг', 'description' => $desc, 'image_path' => '/images/storage/tags/icons/14.svg' ]
        );
        DB::table('tags')->insert(
            [ 'name' => 'Сафари', 'description' => $desc, 'image_path' => '/images/storage/tags/icons/15.svg' ]
        );
        DB::table('tags')->insert(
            [ 'name' => 'Мототур', 'description' => $desc, 'image_path' => '/images/storage/tags/icons/16.svg' ]
        );
        DB::table('tags')->insert(
            [ 'name' => 'Автотур', 'description' => $desc, 'image_path' => '/images/storage/tags/icons/17.svg' ]
        );
    }
}
