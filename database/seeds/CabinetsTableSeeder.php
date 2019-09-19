<?php

use App\Models\Cabinet;
use App\User;
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
        $users = User::get();
        foreach ($users as $user){
            Cabinet::create([
                'first_name' => $user->name,
                'email' => $user->email,
                'user_id' => $user->id,
            ]);
        }
    }
}

