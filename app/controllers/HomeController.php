<?php
/**
 * Created by PhpStorm.
 * User: crlt_
 * Date: 2018/1/16
 * Time: 下午4:26
 */
class HomeController extends BaseController
{

    public function home()
    {
        //$this->view=View::make('home')->with('article',Article::first());
        //echo "zx";
        $article = Article::first();
        require dirname(__FILE__).'/../views/home.php';
    }
}