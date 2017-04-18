<?php
//require_once 'app/include/database.php';

if (!isset($_COOKIE['id'])) {
    if (isset($_POST['log'])) {
        $user_username = mysqli_real_escape_string($link, trim($_POST['username']));
        $user_password = mysqli_real_escape_string($link, trim($_POST['password']));

        if (!empty($user_username) && !empty($user_password)) {
            entrance_to_the_blog($user_username, $user_password);
        } else {
            echo '<div class="alert alert-danger"> <b>Извените, но вы должны заполнить поля правильно</b> </div>';
        }
    }
}

// <button type="submit" name="log" class="btn btn-primary ">
//                            <i class="fa fa-arrow-right"></i> ВОЙТИ
//                        </button>  
//<input type="submit" name="log" class="btn btn-primary " value="ВОЙТИ"></input>  
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->



        <!-- Bootstrap -->
        <link href="../public/css/bootstrap.css" rel="stylesheet">
        <link href="../public/css/font-awesome.css" rel="stylesheet">
        <link rel="shortcut icon" href="../app/icon/favicon.ico">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <div class="navbar navbar-inverse navbar-static-top " style="font-size: 180%; "> <!--Красивая рамка для навигации-->
            <div class="container">
                <div class="navbar-header" > <!--Адаптивное разделение представления навигации-->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu" >
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>                    
                </div>
                <div class="collapse navbar-collapse" id="responsive-menu"  >
                    <a class="navbar-brand" href="/index.php"><i  class="fa fa-globe " style="font-size: 300%; padding: 0 0 0 0" ></i></a>
                    <div style="padding: 18px 0 0 0 ">
                        <ul class="nav navbar-nav" style="padding: 0px 0 16px 20px ">
                            <li></li>
                            <li><a href="/index.php"  >На главную</a></li>

                        </ul>
                        <?php
                        if (empty($_COOKIE['username'])) {
                            ?>

                            <form method="POST" class="navbar-form navbar-right">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="E-mail">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Пароль" value="">
                                </div>                        
                                <button type="submit" name="log" class="btn btn-primary ">
                                    <i class="fa fa-arrow-right" ></i> ВОЙТИ </button>


                                <a  href="/registration.php" class="btn btn-success ">
                                    <i  class="fa fa-arrow-right"></i> РЕГИСТРАЦИЯ 
                                </a> 
                            </form>   
                            <?php
                        } else {
                            if ($_COOKIE['username'] == "admin") {
                                ?>  
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="/admin/admin.php">Панель Администратора </a></li>
                                    <li><a href="/app/exitCookie.php">Выйти</a></li>                                
                                </ul>

                            <?php } else {
                                ?>
                                <ul class="nav navbar-nav navbar-right" style="padding: 0 40px 0 0">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle "></i><?= " " . $_COOKIE['username'] . " " ?><b class="caret"></b></a>
                                        <ul class="dropdown-menu nav">
                                            <li><a href="/app/myCabinet.php"><h4>Мой кабинет</h4></a></li>
                                            <li><a href="/app/exitCookie.php"><h4>Выйти</h4></a></li>         
                                        </ul>
                                    </li>

                                </ul>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>   
        </div>  


