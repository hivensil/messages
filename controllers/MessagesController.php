<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 17.07.2018
 * Time: 11:39
 */
namespace Messages\Controllers;

class MessagesController{
    public function view( $args ){
        var_dump( 'aaaa! im MessageController', $args );
    }
}