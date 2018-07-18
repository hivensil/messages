<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 18.07.2018
 * Time: 21:52
 */

namespace Messages;
require "vendor/autoload.php";

session_start();

if ($_POST){
    $model = new \Messages\Models\AuthModel();
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $model = new \Messages\Models\AuthModel();
        if ( $model->login($email) ){
            header('location:/messages/view');
        }else
            header('location:/auth/login');
    }

}