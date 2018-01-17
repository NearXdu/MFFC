<?php

/**
 * Created by PhpStorm.
 * User: crlt_
 * Date: 2018/1/17
 * Time: 下午4:37
 */

use Predis\Client;

class  Redis
{
    const CONFIG_FILE = '/config/redis.php';
    protected static $redis;

    public static function init()
    {
        self::$redis = new Client(require BASE_PATH . self::CONFIG_FILE);
    }

    public static function set($key, $value, $time = null, $unit = null)
    {
        self::init();
        if ($time) {
            switch ($unit) {
                case 'h':
                    $time *= 3600;
                    break;
                case 'm':
                    $time *= 60;
                    break;
                case 's':
                case 'ms':
                    break;
                default:
                    throw new InvalidArgumentException('单位只能是 h m s ms');
                    break;
            }
            if ($unit == 'ms') { //set ms
                self::_psetex($key,$value,$time);
            } else {//set s
                self::_setex($key,$value,$time);
            }
        } else {//set
            self::$redis->set($key, $value);
        }
    }

    /**
     * @param $key
     * @return mixed
     */
    public static function get($key)
    {
        self::init();
        return self::$redis->get($key);
    }

    /**
     * @param $key
     * @return mixed
     */
    public static function delete($key)
    {
        self::init();
        return self::$redis->del($key);
    }


    private static function _setex($key, $value, $time)
    {
        self::$redis->setex($key, $time, $value);
    }

    private static function _psetex($key, $value, $time)
    {
        self::$redis->psetex($key, $time, $value);
    }

}