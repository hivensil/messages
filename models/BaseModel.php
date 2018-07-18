<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 18.07.2018
 * Time: 8:25
 */
namespace Messages\Models;

class BaseModel{

    protected $db="";

    public function __construct(){
        require(__DIR__.'/../config.php');

        $this->db = new \mysqli($config['db']['host'], $config['db']['user'], $config['db']['password'], $config['db']['database']);

        $this->db->set_charset('utf8');

        if ($this->db->connect_errno) {
            throw new \Exception('Ошибка при работе с БД',500);
        }
    }
}