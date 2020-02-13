<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['category'=>'IPA'],
            ['category'=>'PILSNER'],
            ['category'=>'Pale Ale'],
            ['category'=>'stout'],
            ['category'=>'Amber Ale'],
            ['category'=>'Belgian White'],
            ['category'=>'Real Ale'],
        ]);
    }
}
