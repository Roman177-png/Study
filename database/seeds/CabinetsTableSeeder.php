<?php

use Illuminate\Database\Seeder;

class CabinetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Cabinet', 50)->create();
    }
}

