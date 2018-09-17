<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    const OPERACAO_INSERT = 'INSERT';
    const OPERACAO_SELECT = 'SELECT';
    const OPERACAO_UPDATE = 'UPDATE';
    const OPERACAO_DELETE = 'DELETE';

    

}
