<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 18.07.2018
 * Time: 16:11
 */

namespace Messages\Models;

class AuthModel extends BaseModel{

    public function __construct(){
    }

    public function is_auth(){
        if (isset($_SESSION['logined'])){
            return true;
        }else
            return false;

    }

    public function login( $authstring ){
        $model = new UserModel();
        $user = $model->getUserByLoginOrEmail($authstring);
        if ($user){
            $_SESSION['logined']=json_encode($user);
            return true;
        }
        return false;
    }

    public function logout(){
        session_unset();
    }

    public function getSessionUser(){
        if (isset($_SESSION['logined'])){
            return json_decode($_SESSION['logined']);
        }
    }

    public function getAnonymousUser(){
        $model = new UserModel();
        $user = $model->getUserByLoginOrEmail('anonymous');
        return $user;
    }
}