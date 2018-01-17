<?php

/**
 * Created by PhpStorm.
 * User: crlt_
 * Date: 2018/1/16
 * Time: 下午4:25
 */
class BaseController
{

    protected $view;
    protected $mail;
    public function __destruct()
    {

        $view = $this->view;

        if ($view instanceof View) {

            extract($view->data);

            require $view->view;

        }

        $mail = $this->mail;
        if($mail instanceof Mail){
            $mailer=new \Nette\Mail\SmtpMailer($mail->config);
            $mailer->send($mail);
        }

    }


    public function __construct()
    {
    }
}