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
        $result = $this->db->query("select * from users where id=$user_id");
        return $result->fetch_object();
    }

    public function getUserByLoginOrEmail($str){
        $sql="select * from users where login='{$str}' or email='{$str}'";
        $result = $this->db->query($sql);
        return $result->fetch_object();
    }
}