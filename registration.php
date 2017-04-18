<!DOCTYPE html>

<?php
require_once 'app/include/database.php';

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($link, trim($_POST['username']));
    $password_1 = mysqli_real_escape_string($link, trim($_POST['password_1']));
    $password_2 = mysqli_real_escape_string($link, trim($_POST['password_2']));
    if (!empty($username) && !empty($password_1) && !empty($password_2) && ($password_1 == $password_2)) {
        registration_on_the_blog($username, $password_1);
    }
    else{
        echo '<div class="alert alert-danger"> <b>НЕкорректный ввод, повторите попытку</b> </div>'; 
    }
}

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Регистрация</title>

    <!-- Bootstrap -->
    <link href="public/css/bootstrap.css" rel="stylesheet">
    <link href="public/css/font-awesome.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<div class="container " style="padding:  150px 0 0 150px;">    
    <h1> <b> Cоздать акаунт ... </b> </h1>
    <div>
        <form method="POST" action="registration.php" class="navbar-nav"  style="padding:  0 0 0 14px;">
            <h2 >  Имя или электронная почта</h2>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="например, Стасик или StasicDominator2004@yand..." >
            </div>
            <h2 >  Пароль </h2>
            <div class="form-group" >
                <input type="password" name="password_1" class="form-control" placeholder="например, ************" value="">
            </div>     
            <h2 >  Пароль еще раз</h2>
            <div class="form-group" >
                <input type="password" name="password_2" class="form-control" placeholder="например, ************" value="">
            </div> 
            <ul class="list-inline" style="padding:   0 0 14px 0 ;">     
                <li> <input type="checkbox" class="checkbox" /> </li>    
                <li> <h3 >  Я принимаю </h3>                    </li>  
                <li> <a href="/admin/usageCondition.php">  <h3>Условия использования </h3> </a>            </li>                
            </ul> 
            <input class="btn btn-primary" type="submit"  name="submit" value="Создать новый аккаунт">

            </input> 
        </form>  
    </div>
</div>


