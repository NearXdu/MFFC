<?php
/**
 * Created by PhpStorm.
 * User: crlt_
 * Date: 2018/1/16
 * Time: 下午3:15
 */


use Illuminate\Database\Capsule\Manager as Capsule;

define ("PUBLIC_PATH",__DIR__);
require '../vendor/autoload.php';

require PUBLIC_PATH."/../bootstrap.php";

//$capsule = new Capsule;
//$capsule->addConnection(require '../config/database.php');
//
//$capsule->bootEloquent();

require BASE_PATH."/config/routes.php";
//require '../config/routes.php';
