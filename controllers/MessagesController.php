<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 17.07.2018
 * Time: 11:39
 */
namespace Messages\Controllers;

use Messages\Models\MessagesModel;
use Messages\Models\AuthModel;

class MessagesController extends BaseController{

    public function view( $args ){
        $model = new MessagesModel();

        if (isset($args['page']))
            $page=$args['page'];
        else
            $page=1;

        $messages = $model->listMessages($page,10);
        $pagerData=$model->getPagerData($page,10);

        $data=['messages'=>$messages,'pagerData'=>$pagerData];
        ob_start();
        require(\Messages\DOC_ROOT.'/templates/messages.php');
        $content=ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function fullview($args){
        if (isset($args['id'])){
            $model = new MessagesModel();
            $message = $model->getById($args['id']);
            $comments=$model->listComments($args['id']);
            ob_start();
            require(\Messages\DOC_ROOT.'/templates/message.php');
            $content=ob_get_contents();
            ob_end_clean();
            return $content;
        }
    }

    public function addComment($args){
        $model = new AuthModel();
        if ($model->is_auth()){
            $current_user = $model->getSessionUser();
        }else
            $current_user=$model->getAnonymousUser();

        if (isset($args['comment']) && isset($args['message_id']) ){
           $model = new MessagesModel();
           $model->addComment($args['comment'],$args['message_id'],$current_user->id);
        }
    }

    public function createMessage($args){

        if ($_POST){
            $model = new AuthModel();
            if ($model->is_auth()){
                $current_user = $model->getSessionUser();
            }else
                $current_user=$model->getAnonymousUser();

            if (isset($args['title']) && isset($args['summary_content']) && isset($args['full_content']) ){
                $message=new \stdClass();
                $message->title = $args['title'];
                $message->summary_content = $args['summary_content'];
                $message->full_content = $args['full_content'];
                $message->user_id=$current_user->id;
                $model = new MessagesModel();
                $model->createMessage($message);
                header('location:/messages/view');
            }
        }else{
            ob_start();
            require(\Messages\DOC_ROOT.'/templates/createMessageForm.php');
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
    }

}