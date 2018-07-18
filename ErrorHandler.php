<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 18.07.2018
 * Time: 10:17
 */

namespace Messages;

class ErrorHandler{

    public function __construct(){
        set_error_handler(array($this, 'NonCriticalError'));
        register_shutdown_function(array($this, 'Shutdown'));
        ob_start();
    }

    public function NonCriticalError($errno,$errstr){
        $error="Error! ".$errstr."\n";
        file_put_contents(DOC_ROOT.'/log', $error, FILE_APPEND );
        return false;
    }

    public function Shutdown(){
        $error = error_get_last();
        if (isset($error)){
            ob_end_clean();
            file_put_contents(DOC_ROOT.'/log', json_encode($error)."\n", FILE_APPEND );
            header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
            echo("Извините, произошла фатальная ошибка!");
            exit();
        }else
            ob_end_flush();
    }

}