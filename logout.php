<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 18.07.2018
 * Time: 21:52
 */

namespace Messages;
require "vendor/autoload.php";

ini_set('session.use_cookies',1);
ini_set('session.name','messages_session');
ini_set('session.cookie_lifetime',3600);
session_start();

$model = new \Messages\Models\AuthModel();
$model->logout();
header('location:/messages/view');


