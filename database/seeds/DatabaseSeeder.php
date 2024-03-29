<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(OffersTableSeeder::class);
        $this->call(TopicsTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(CabinetsTableSeeder::class);

    }
}
