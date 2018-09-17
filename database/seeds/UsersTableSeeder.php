<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\UserType;

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
            'cpf' => '75507897700',
            'email' => 'luizaomarvila@gmail.com',
            'password' => bcrypt('lula13'),
            'user_type_id' => UserType::DIRETOR
        ]);

        DB::table('users')->insert([
            'name' => 'ROBISON PEREIRA MACHADO',
            'cpf' => '11867681773',
            'email' => 'robisonpmachado@gmail.com',
            'password' => bcrypt('nopainnogain'),
            'user_type_id' => UserType::FUNCIONARIO
        ]);


    }
}
