<?php
/**
 * Created by PhpStorm.
 * User: crlt_
 * Date: 2018/1/16
 * Time: 下午9:42
 */
use Illuminate\Database\Capsule\Manager as Capsule;

define("BASE_PATH",__DIR__);
require BASE_PATH.'/vendor/autoload.php';

$capsule = new Capsule;

$capsule->addConnection(require BASE_PATH.'/config/database.php');

$capsule->bootEloquent();

$whoops = new \Whoops\Run;

$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);

$whoops->register();