<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 19.07.2018
 * Time: 10:04
 */
?>

<form method="post" action="/messages/edit">
    <h2>Редактирование сообщения</h2>
    <input type="hidden" name="id" value="<?PHP echo $message->id;?>">
    <div class="form-group">
        <label for="title">Заголовок</label>
        <input type="text"id="title" class="form-control" name="title" value="<?PHP echo $message->title ?>" />
    </div>

    <div class="form-group">
        <label for="summary_content">Краткое содержание</label>
        <textarea id="summary_content" class="form-control"  name="summary_content"><?PHP echo $message->summary_content;?></textarea>
    </div>

    <div class="form-group">
        <label for="full_content">Полное содержание</label>
        <textarea id="full_content" class="form-control"  name="full_content"><?PHP echo $message->full_content;?></textarea>
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">Сохранить</button>
    </div>
</form>

<script>
    window.onload=function(){
        $("#summary_content").cleditor();
        $("#full_content").cleditor();
    }

</script>