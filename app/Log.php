<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Log extends Model
{
    protected $fillable = [
        'user_name', 'user_type_name', 'eventType', 'eventData'
    ];


    const EVENT_DB_INSERT = 'INSERT';
    const EVENT_DB_SELECT = 'SELECT';
    const EVENT_DB_UPDATE = 'UPDATE';
    const EVENT_DB_DELETE = 'DELETE';
    const EVENT_FILE_SAVE = 'FILE_SAVE';
    const EVENT_FILE_DELETE = 'FILE_DELETE';
    const EVENT_FILE_DOWNLOAD = 'FILE_DOWNLOAD';

    public static function addLog(string $eventType, EventData $eventData){
        if (Auth::check()){
            $user = Auth::user();
            if(self::isValidEventType($eventType)){
                echo 'valid op';
                $log = new Log;
                $log->user_name = $user->name;
                $log->user_type_name = UserType::nameById($user->user_type_id);
                $log->eventType = $eventType;
                $log->eventData = \json_encode($eventData);
                $log->save();
            }
        }
        
    }

    public static function eventDBSelect(DatabaseEventData $databaseEventData){
        return self::addLog(Log::EVENT_DB_SELECT, $databaseEventData);
    }

    public static function eventDBInsert(DatabaseEventData $databaseEventData){
        return self::addLog(Log::EVENT_DB_INSERT, $databaseEventData);
    }

    public static function eventDBUpdate(DatabaseEventData $databaseEventData){
        return self::addLog(Log::EVENT_DB_UPDATE, $databaseEventData);
    }

    public static function eventFileSave(FileEventData $fileEventData){
        return self::addLog(Log::EVENT_FILE_SAVE, $fileEventData);
    }

    public static function eventFileDelete(FileEventData $fileEventData){
        return self::addLog(Log::EVENT_FILE_DELETE, $fileEventData);
    }

    public static function eventFileDownload(FileEventData $fileEventData){
        return self::addLog(Log::EVENT_FILE_DOWNLOAD, $fileEventData);
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

class DatabaseEventData extends EventData{
    public $tableName;
    public function __construct(string $tableName, $data){
        $this->tableName = $tableName;
        $this->data = $data;
    }
}

class FileEventData extends EventData{
    public function __construct($data){
        $this->data = $data;
    }
}

