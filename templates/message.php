<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 19.07.2018
 * Time: 6:10
 */
?>

<h2><?PHP echo $message->title; ?></h2>
<?PHP echo $message->full_content ?>

<div class="comments-container">

    <div class="form-group">
        <label for="comment">Оставить комментарий</label><br>
        <textarea id="comment" rows="5"></textarea>
    </div>
    <div>
        <button class="btn btn-primary" onclick="addComment(<?PHP echo $message->id?>);">Отправить</button>
    </div>

    <div class="comments-list">
        <div>Комментарии</div>
        <div class="list">
            <?PHP foreach($comments as $comment) { ?>
                <div class="comment">
                    <div class="comments-author"><strong><?PHP echo $comment->name; ?></strong></div>
                    <div class="comment-body">
                        <?PHP echo trim($comment->content); ?>
                    </div>
                </div>
            <?PHP } ?>
        </div>
    </div>

    <script>
        function addComment(message_id){
            var data={'comment':$('#comment').val(),'message_id':message_id};
            $.ajax({
                'url':'/comments/add',
                'data':data,
                'type':'POST'
            }).done(function(){
               document.location.reload();
            });
        }
    </script>

</div>