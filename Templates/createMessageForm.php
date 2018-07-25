<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 19.07.2018
 * Time: 10:04
 */
?>

<form method="post" action="/messages/create">
    <h2>Создание сообщения</h2>
    <div class="form-group">
        <label for="title">Заголовок</label>
        <input type="text"id="title" class="form-control" name="title" />
    </div>

    <div class="form-group">
        <label for="summary_content">Краткое содержание</label>
        <textarea id="summary_content" class="form-control"  name="summary_content"></textarea>
    </div>

    <div class="form-group">
        <label for="full_content">Полное содержание</label>
        <textarea id="full_content" class="form-control"  name="full_content"></textarea>
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