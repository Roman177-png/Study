<?php
use App\Models\Topic;
use Illuminate\Database\Seeder;
class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::create([
            'name' => 'Чому варто купляти великий будинок?',
        ]);
        Topic::create([
            'name' => 'Чи потребую я бдуинок?',
        ]);
        Topic::create([
            'name' => 'Квартира чи Будинок?',
        ]);
        Topic::create([
            'name' => 'Чому варто бути обережним при купівлі квартири?',
        ]);
        Topic::create([
            'name' => 'Чи варто мати свій сад?',
        ]);

    }
}