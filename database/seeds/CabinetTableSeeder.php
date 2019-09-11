<?php

use App\Models\Article;
use Illuminate\Database\Seeder;

class CabinetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Cabinet', 1)->create();
    }
}

