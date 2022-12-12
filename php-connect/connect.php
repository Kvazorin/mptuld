<?php
    $connect = mysqli_connect('127.0.0.1','root','','mptuld');
    mysqli_set_charset($connect,'utf8');

    if(!$connect) {
        printf("Невозможно подключиться к БД. Код ошибки: %s\n", mysqli_connect_error());
        exit();
    }
?>