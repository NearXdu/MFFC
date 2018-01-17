<?php
/**
 * Created by PhpStorm.
 * User: crlt_
 * Date: 2018/1/16
 * Time: 下午9:56
 */
class View{
    const VIEW_BASE_PATH="/app/views/";
    public $view;
    public $data;

    /**
     * View constructor.
     * @param $view
     */
    public function __construct($view)
    {
        $this->view = $view;
    }

    /**
     * @param null $viewName
     * @return View
     */
    public static function make($viewName = null)
    {
        if (!$viewName) {
            throw new InvalidArgumentException("视图名不能为空");
        } else {
            $viewFilePath = self::getFilePath($viewName);
            if ( is_file($viewFilePath) ) {
                return new View($viewFilePath);
            } else {
                throw new UnexpectedValueException("视图文件不存在！");
            }

        }
    }

    /**
     * @param $key
     * @param null $value
     * @return $this
     */
    public function with($key, $value = null)
    {
        $this->data[$key] = $value;
        return $this;
    }

    /**
     * @param $viewName
     * @return string
     */
    private static function getFilePath($viewName)
    {
        $filePath = str_replace('.', '/', $viewName);
        return BASE_PATH.self::VIEW_BASE_PATH.$filePath.'.php';
    }

    /**
     * @param $method
     * @param $parameters
     * @return View
     */
    public function __call($method, $parameters)
    {
        if (starts_with($method, 'with'))
        {
            return $this->with(snake_case(substr($method, 4)), $parameters[0]);
        }

        throw new BadMethodCallException("方法 [$method] 不存在！.");
    }

}