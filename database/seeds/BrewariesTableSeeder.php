<?php

use Illuminate\Database\Seeder;

class BrewariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brewaries')->insert([
            ['brewary'=>'KIRINビール'],
            ['brewary'=>'アサヒビール'],
            ['brewary'=>'ヤッホーブルーイング'],
            ['brewary'=>'サッポロビール'],
        ]);
    }
}
