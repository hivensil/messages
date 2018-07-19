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

    public function sanitizeString(string $data){
        return $this->db->real_escape_string( htmlspecialchars($data) );
    }

    public function sanitizeObject(object $data){
        $new_data=new \stdClass();
        $fields=(array)$data;
        foreach($fields as $key=>$value){
            $new_data->$key=$this->sanitizeString($fields[$key]);
        }
        return $new_data;
    }
}