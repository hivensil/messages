<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 18.07.2018
 * Time: 18:19
 */
namespace Messages\Controllers;

use \Messages\Models;

class AuthController extends BaseController{

    public function login($args){
        if ($_POST){
            if (filter_var($args['email'], FILTER_VALIDATE_EMAIL)) {
                $model = new \Messages\Models\AuthModel();
                if ( $model->login($args['email']) ){
                   header('location:/index.php');
                    $template='Вы успешно вошли в систему';
                }else
                $template='Указанный email не найден';
            }
        }else {
            ob_start();
            require(\Messages\DOC_ROOT . '/Templates/login.php');
            $template = ob_get_contents();
            ob_end_clean();
        }
        return $template;
    }

    public function logout($args){
        $model= new \Messages\Models\AuthModel();
        $model->logout();
        header('location:/index.php');
    }
}