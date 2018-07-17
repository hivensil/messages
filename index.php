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

$router = new Router();
$router->route("/messages/view",'MessagesController','view');
$content = $router->dispatch();

require('templates/page.php');





