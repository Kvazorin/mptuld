<?php
    session_start();
    require_once "../php-connect/connect.php";

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $login = trim($_POST['login']);

    $chek_user = "SELECT * FROM `members` WHERE `email` = '$email' AND `password` = '$password'";
    $result = mysqli_query($connect,$chek_user);
    
    $info_user = mysqli_fetch_array($result);

    if($info_user['password'] === $password){
        $_SESSION['user'] = $info_user;
        header("Location: ../index_panel.php");
    } else {
        echo "Проверьте правильность введеных Вами данных";
    }





?>