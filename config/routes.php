<?php
/**
 * Created by PhpStorm.
 * User: crlt_
 * Date: 2018/1/16
 * Time: 下午3:17
 */
use NoahBuscher\Macaw\Macaw;


Macaw::get('fuck', function() {
    echo "成功！";
});

Macaw::get('', 'HomeController@home');

Macaw::$error_callback = function() {

    throw new Exception("路由无匹配项 404 Not Found");

};

Macaw::dispatch();