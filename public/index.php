<?php
/**
 * Created by PhpStorm.
 * User: crlt_
 * Date: 2018/1/16
 * Time: 下午3:15
 */


use Illuminate\Database\Capsule\Manager as Capsule;
require '../vendor/autoload.php';


$capsule = new Capsule;
$capsule->addConnection(require '../config/database.php');

$capsule->bootEloquent();

require '../config/routes.php';
