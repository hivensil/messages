
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="простая система вывода сообщений">
    <meta name="author" content="vshevchuk">
    <link rel="icon" href="/favicon.ico">

    <title>Simple Messages</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!--Iconic-->
    <link href="/vendor/iconic/css/open-iconic-bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/style.css" rel="stylesheet">
</head>

<body>

<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">О программе</h4>
                    <p class="text-muted">Простейшая система вывода сообщений, реализованная в рамках тестового задания. Собственный MVC движок сделан за пару часов на коленке, не используйте в production.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Контакты</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white"> <span class="oi oi-envelope-closed" aria-hidden="true"></span> hivensil@gmail.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="/messages/view" class="navbar-brand d-flex align-items-center">
                <span class="oi oi-book" style="color:yellow;"></span>
                &nbsp;
                <strong>Simple Messages</strong>
                &nbsp;

            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
    <div class="login_panel">
        <span class="user_name"><?PHP echo $user->name ?></span>
        <?PHP if ($user->login !='anonymous') {?>
            <a href="/logout.php">( Выйти )</a>
        <?PHP }else { ?>
            <a href="/auth/login">( Войти )</a>
        <?PHP } ?>
    </div>
</header>

<main role="main">


    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                    <?PHP print($content);?>
            </div>
        </div>
    </div>

</main>

<footer class="text-muted">
    <div class="container">
        <p>&copy; Копирайт и прочая информация</p>
    </div>
</footer>

<script src="/vendor/jquery.min.js" ></script>
<script src="/vendor/bootstrap/bootstrap.min.js"></script>
</body>
</html>