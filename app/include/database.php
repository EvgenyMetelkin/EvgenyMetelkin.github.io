<?php

require_once '/functionDB.php';

$link = mysqli_connect('localhost','root','','my_blog'); // подключает к серверу базданных. аргументы: сервер, имя пользователя, пароль, имя базы данных.

if(mysqli_connect_errno()) 
{
    echo 'Ошибка в подключении к базe данных ('. mysqli_connect_errno().'): '. mysqli_connect_error();
    exit(); //return 0;
}

