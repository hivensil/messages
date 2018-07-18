<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 17.07.2018
 * Time: 11:39
 */
namespace Messages\Controllers;

class MessagesController extends BaseController{
    public function view( $args ){
        return 'aaaa! im MessageController'.json_encode($args);
    }
    public function view2( $args ){
        return 'view2 content';
    }
}