<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'LUIZ ANTÔNIO OLIVEIRA MARVILA',
            'cpf' => '1234',
            'email' => 'luizaomarvila@gmail.com',
            'password' => bcrypt('1234'),
            'user_type_id' => 2
        ]);


    }
}
