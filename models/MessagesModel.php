<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 18.07.2018
 * Time: 8:35
 */

namespace Messages\Models;

class MessagesModel extends BaseModel{

    public function listMessages( $page=1, $itemsPerPage=10 ){

        $offset=$itemsPerPage*($page-1);

        $sql="select * from messages order by created DESC limit {$itemsPerPage} offset {$offset} ";

        $result = $this->db->query($sql);

        $data=array();
        while ($row=$result->fetch_object()){
            $row->summary_content=htmlspecialchars_decode($row->summary_content);
            $row->full_content=htmlspecialchars_decode($row->full_content);
            $data[]=$row;
        }

        return $data;
    }

    public function getPagerData( $page=1, $itemsPerPage=10 ){
        $result =$this->db->query("select count(*) as c from messages");
        $row=$result->fetch_object();
        return [
          'total'=>$row->c,
          'pagesCount'=>floor($row->c/$itemsPerPage)+1,
          'itemsPerPage'=>$itemsPerPage,
          'currentPageNum'=>$page
        ];
    }

    public function getById($id){
        $sql="select * from messages where id={$id}";
        $result = $this->db->query($sql);
        $row=$result->fetch_object();
        $row->summary_content=htmlspecialchars_decode($row->summary_content);
        $row->full_content=htmlspecialchars_decode($row->full_content);
        return $row;
    }

    public function listComments($id){
        $sql="select * from comments  join users on comments.user_id=users.id where message_id={$id}";
        $result = $this->db->query($sql);
        $data=array();
        while ($row=$result->fetch_object()){
            $data[]=$row;
        }
        return $data;
    }

    public function createMessage($message){
        $message=$this->sanitizeObject($message);
        $sql="insert into messages (user_id,title,summary_content,full_content)
        values({$message->user_id},'{$message->title}','{$message->summary_content}','{$message->full_content}')";
        return $this->db->query($sql);
    }

    public function editMessage($message){
        $message=$this->sanitizeObject($message);
        $sql="update messages set
        title='{$message->title}',summary_content='{$message->summary_content}',full_content='{$message->full_content}' where id={$message->id}";
        return $this->db->query($sql);
    }

    public function addComment($comment,$message_id, $user_id){
        $sql="insert into comments (user_id,message_id,content) values({$user_id},{$message_id},'{$comment}')";
        return $this->db->query($sql);
    }
}