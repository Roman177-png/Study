<?php
use App\Models\Category;
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
        Category::create([
            'name' => 'Продаж квартир',
        ]);
        Category::create([
            'name' => 'Продаж домів',
        ]);
        Category::create([
            'name' => 'Оренда квартир',
        ]);
        Category::create([
            'name' => 'Оренда домів',
        ]);
        Category::create([
            'name' => 'Продаж землі',
        ]);

    }
}