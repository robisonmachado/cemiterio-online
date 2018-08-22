<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert(['name' => 'ZELADOR DE CEMITÉRIO']);
        DB::table('user_types')->insert(['name' => 'DIRETOR']);
        DB::table('user_types')->insert(['name' => 'SUPERINTENDENTE']);
        DB::table('user_types')->insert(['name' => 'SECRETÁRIO']);
    }
}
