<?php

use Illuminate\Database\Seeder;

class QuadrasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 2) as $numero) {
            DB::table('quadras')->insert(['numero' => $numero]);
        }
        
        
    }
}
