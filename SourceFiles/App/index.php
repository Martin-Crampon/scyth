<?php
require_once "../vendor/autoload.php";

use App\Core\RequestParser;
use App\Controller\Controller;

use App\Core\GlobalStuff;

use Illuminate\Database\Capsule\Manager as Capsule;

echo $_GET['controller'] . '<br>';
echo $_GET['action'] . '<br>';
echo $_GET['param1'] . '<br>';
$capsule = new Capsule;
$capsule->addConnection(GlobalStuff::GetDatabaseInfos());
$capsule->setAsGlobal();
echo '<pre>';
//var_dump($capsule);
$currentVersion = Capsule::select('SELECT * FROM database_version');
var_dump($currentVersion);
echo '</pre>';

echo '<pre>';
var_dump($currentVersion[0]->number);
var_dump("0.1" == $currentVersion[0]->number);
echo '</pre>';