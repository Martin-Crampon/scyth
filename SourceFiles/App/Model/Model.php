<?php

namespace App\Model;

use App\Core\GlobalStuff;
use Exception;
use Illuminate\Database\Capsule\Manager as Capsule;

abstract class Model
{
    const DATABASE_VERSION = "0.1";

    private $capsule = NULL;

    protected function __construct()
    {
        $this->capsule = new Capsule;
        $this->capsule->addConnection(GlobalStuff::GetDatabaseInfos());
        $this->capsule->setAsGlobal();

        if($this->isDatabaseVersionUpToDate()):
            throw new Exception("Wrong database version", 500);
        endif;
    }

    private function isDatabaseVersionUpToDate()
    {
        $currentVersion = Capsule::table("database_version")->get("number");

        return self::DATABASE_VERSION == $currentVersion[0]->number;
    }

    abstract protected function getDBTable();

    public static function printSomething()
    {
        // To do
    }
}
