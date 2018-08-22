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
        $this->call([
            QuadrasTableSeeder::class,
            //FilasTableSeeder::class,
            //CovasTableSeeder::class,
            
            UserTypesTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
