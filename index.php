<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 17.07.2018
 * Time: 9:05
 */

namespace Messages;
require "vendor/autoload.php";

use Messages\Controllers\MessagesController;
use Messages\Models\AuthModel;

const DOC_ROOT=__DIR__;

//обработка ошибок
$errorHandler = new ErrorHandler();

//маршрутизация
$router = new Router();
$router->route("/messages/view",'MessagesController','view');
$router->route("/messages/fullview",'MessagesController','fullview');
$router->route("/messages/create",'MessagesController','createMessage');
$router->route("/",'MessagesController','view');
$router->route("/auth/login",'AuthController','login');
$router->route("/auth/logout",'AuthController','logout');
$router->route("/comments/add",'MessagesController','addComment');


$content = $router->dispatch();

//сессия
ini_set('session.use_cookies',1);
ini_set('session.name','messages_session');
ini_set('session.cookie_lifetime',3600);
session_start();

//пользователь авторизован?
$model = new AuthModel();
if ($model->is_auth()){
    $user=$model->getSessionUser();
}else{
    $user=$model->getAnonymousUser();
}


require('templates/page.php');