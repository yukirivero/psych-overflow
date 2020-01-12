<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\User::class, 3)->create(); //Generate 3 random users
        //factory(App\Question::class, 10)->create();


        factory(App\User::class, 3)->create()->each(function($u){
        	$u->questions()->savemany(
        		factory(App\Question::class, rand(1, 5))->make()
        	);
        });
    }
}
