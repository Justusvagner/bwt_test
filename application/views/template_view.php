<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Парсер</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="includes/style.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
<body>
<div class="container-fluid"> 
    <div class="header">
        <p>Погода в Запорожье сегодня</p>
        <p style="font-size: 15px;"> 
            <?php if (isset($_COOKIE)) echo "Пользователь: $_COOKIE[name]"; ?> </p>
    </div>
    <div class="row" style="background-color: lightblue;">
        <div class="col-lg-2 col-md-2 col-sm-2"></div> 
        <div class="col-lg-2 col-md-2 col-sm-2 lnk">
            <a href="/reg"><strong>Регистрация</strong></a>

            <?php if (!isset($_COOKIE['id'])) {
                ?> / 
            <a href="/login"><strong>Вход</strong></a>
            <?php } ?>

        </div>        
        
        <div class="col-lg-2 col-md-2 col-sm-2 lnk">
            <a href="/main"><strong>Погода</strong></a>
        </div> 
        <div class="col-lg-2 col-md-2 col-sm-2 lnk">
            <a href="/feedback"><strong>Оставить отзыв</strong></a>
        </div> 
        <div class="col-lg-2 col-md-2 col-sm-2 lnk">
            <a href="/reviews"><strong>Отзывы</strong></a>
        </div> 
        <div class="col-lg-2 col-md-2 col-sm-2"></div> 
    </div>

    <?php
    require 'application/views/'.$content_view;
    ?>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js"></script>
</body>
</html>
