<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 18.07.2018
 * Time: 9:49
 */

namespace Messages\Models;

class UserModel extends BaseModel{

    public function getUserByID( $user_id ){

        if ( !$result = $this->db->query("select * from users where id=$user_id") ){
            throw new \Exception('ощибка при работе с бд',500);
        }

        if ($result->num_rows === 1){
            return $result->fetch_object();
        }

        return null;
    }

    public function getUserByLoginOrEmail($str){
        $sql="select * from users where login='{$str}' or email='{$str}'";
        if ( !$result = $this->db->query($sql) ){
            throw new \Exception('ощибка при работе с бд',500);
        }

        if ($result->num_rows === 1){
            return $result->fetch_object();
        }

        return null;
    }
}