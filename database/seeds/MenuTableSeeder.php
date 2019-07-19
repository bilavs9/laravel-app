<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            ['menu_name' =>'home'],
            ['menu_name' =>'about'],
            ['menu_name' =>'gallery'],
            ['menu_name' =>'contact'],
        ]);

    }
}
