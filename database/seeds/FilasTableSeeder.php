<?php

use Illuminate\Database\Seeder;

class FilasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 2) as $quadra) {
            foreach (range(1, 25) as $numero) {
                DB::table('filas')->insert(['numero' => $numero, 'quadra_id' => $quadra]);
            }
        }
        

    }
}
