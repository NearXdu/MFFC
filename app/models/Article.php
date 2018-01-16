<?php
/**
 * Created by PhpStorm.
 * User: crlt_
 * Date: 2018/1/16
 * Time: 下午4:46
 */
class Article extends \Illuminate\Database\Eloquent\Model
{
    public $timestamp=false;


//    public static function first()
//    {
//        $connection = mysqli_connect("localhost","root","nightwatch","mffc",3306,"/tmp/mysql.sock");
//
//
//        if (!$connection) {
//            die('Could not connect: ' . mysqli_error());
//        }
//        mysqli_set_charset($connection,"UTF8");
//
//        $result = mysqli_query($connection,"SELECT * FROM articles limit 0,1");
//
//        if ($row = mysqli_fetch_array($result)) {
//            return $row;
//        }
//
//        mysqli_close($connection);
//    }
}