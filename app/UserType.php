<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    const DEVELOPER = 7;
    const SECRETARIO = 6;
    const SUPERINTENDENTE = 5;    
    const DIRETOR = 4;
    const ZELADOR = 3;
    const FUNCIONARIO = 2;
    const ESTAGIARIO = 1;


    public static function nameById(int $userTypeId): ?string{
        if($userTypeId == self::DEVELOPER){
            return 'DEVELOPER';
        }

        if($userTypeId == self::SECRETARIO){
            return 'SECRETÁRIO';
        }

        if($userTypeId == self::SUPERINTENDENTE){
            return 'SUPERINTENDENTE';
        }

        if($userTypeId == self::DIRETOR){
            return 'DIRETOR';
        }

        if($userTypeId == self::ZELADOR){
            return 'ZELADOR';
        }

        if($userTypeId == self::FUNCIONARIO){
            return 'FUNCIONÁRIO';
        }

        if($userTypeId == self::ESTAGIARIO){
            return 'ESTAGIÁRIO';
        }
        
        return null;

    }

    
}
