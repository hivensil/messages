<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 17.07.2018
 * Time: 9:04
 */

namespace Messages;

use Messages\Controllers\MessagesController;

class Router
{
    protected  $routes=[];

    protected function getCurrentUri() {
        $uri = $_SERVER['REQUEST_URI'];
        if(strpos($uri,'?') >0){
            $uri = substr($uri,0,strpos($uri,'?'));
        }
        return trim($uri,'/');
    }

    public function route( $route, $controller, $action ){
        $this->routes = array_merge( $this->routes, [$route=>[$controller,$action]]);
    }

    protected function executeAction( $destination,$args ){
        $controller = trim($destination[0],'/');
        $action = trim($destination[1],'/');
        $class_name="Messages\\Controllers\\".$controller;
        if (class_exists($class_name)){
            $instance=new $class_name();
            return call_user_func( [$instance, $action], $args );
        }
    }


    public function dispatch(){

        $current_uri = $this->getCurrentUri();
        foreach ($this->routes as $route=>$destination){
            $route=trim($route,'/');
            //$b=$current_uri == $route;
           //print_r(json_encode($current_uri).';'.json_encode($route).';'.json_encode($destination).':'.$b."<br>");
            if ( $current_uri == $route ){
                return $this->executeAction( $destination, $_REQUEST );
            }
        }
        return "no content";

    }
}