<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    if ($email == '') {
        unset($email);
    }
} //заносим введенный пользователем email в переменную $email, если он пустой, то уничтожаем переменную

if (isset($_POST['login'])) {
    $login = $_POST['login'];
    if ($login == '') {
        unset($login);
    }
} //заносим введенный пользователем login в переменную $login, если он пустой, то уничтожаем переменную

if (isset($_POST['password'])) {
    $password = $_POST['password'];
    if ($password == '') {
        unset($password);
    }
} //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную

if (empty($email) or empty($password) or empty($login)) //если пользователь не ввел логин, пароль или email, то выдаем ошибку и останавливаем скрипт
{
    exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}

//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$email = stripslashes($email);
$email = htmlspecialchars($email);
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);

//Определение формата даты логирования
$date = date('Y-m-d H:i:s');

//удаляем лишние пробелы
$email = trim($email);
$login = trim($login);
$password = trim($password);

// подключаемся к базе
require("../php-connect/connect.php");

// проверка на существование пользователя с таким же email
$chek_user = "SELECT * FROM `members` WHERE `email` = '$email' AND `password` = '$password'";
$result = mysqli_query($connect, $chek_user);

$info_user = mysqli_fetch_array($result);

if (!empty($info_user['email'])) {
    exit("Извините, введённый вами email уже зарегистрирован. <br> Введите другой email.");
}

// если такого нет, то сохраняем данные
$insert = "INSERT INTO `members` (`email`, `password`, `login`, `created_at`, `updated_at`) VALUES ('$email','$password','$login', '$date', '$date')";
$result2 = mysqli_query($connect, $insert);

// Проверяем, есть ли ошибки
if ($result2 == 'TRUE') {
    echo "Вы успешно зарегистрированы! <br> Теперь Вы можете перейти на страницу <a href='../login.php'>Авторизации</a>";
} else {
    echo "Ошибка! Вы не зарегистрированы.";
}
