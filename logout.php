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
$model = new \Messages\Models\AuthModel();
$model->logout();
header('location:/messages/view');


