<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Log extends Model
{
    const EVENT_DB_INSERT = 'INSERT';
    const EVENT_DB_SELECT = 'SELECT';
    const EVENT_DB_UPDATE = 'UPDATE';
    const EVENT_DB_DELETE = 'DELETE';
    const EVENT_FILE_SAVE = 'FILE_SAVE';
    const EVENT_FILE_DELETE = 'FILE_DELETE';
    const EVENT_FILE_DOWNLOAD = 'FILE_DOWNLOAD';

    public static function addLog(string $eventType, string $eventData){
        if (Auth::check()){
            $user = Auth::user();
            if(self::isValidEventType($eventType)){
                echo 'valid op';
            }
        }
        
    }

    public static function eventDBUpdate(DatabaseEventData $databaseEventData){
        return self::addLog(Log::EVENT_DB_UPDATE, $databaseEventData);
    }

    public static function isValidEventType(string $eventType): bool{
        return \in_array($eventType, self::getConstants());
    }

    static function getConstants() {
        $oClass = new \ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }


}

class EventData{
    public $data;
}

class DatabaseEventData{
    public $tableName;
    public $data;
}






