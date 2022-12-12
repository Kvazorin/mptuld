<?php

if (!isset($_SESSION["theme"])) {
    $_SESSION["theme"] = "light";
}

?>

<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/povarov.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/<?php echo $_SESSION["theme"]; ?>.css" id="theme_link">

</head>

<body>

    <div class="container">
        <div class="form-centered">

            <form method="POST" action="save_user.php">

                <div class="f_header">
                    <p>Регистрация</p>
                </div>

                <div class="footer_heading">
                    <label>Логин:</label>
                    <input name="login" type="text" placeholder="Введите логин" required maxlength="50">
                </div>
                <div class="footer_heading">
                    <label>Email:</label>
                    <input name="email" type="text" placeholder="Введите email" required maxlength="50">
                </div>
                <div class="footer_heading">
                    <label>Придумайте пароль:</label>
                    <input name="password" type="password" placeholder="Введите пароль" required maxlength="50">
                </div>

                <button type="submit" name="submit" class="form_btn">Зарегистрироваться</button>

                <div class="go_back">
                    <a href="../login.php" class="go_back"><i class="fa-solid fa-chevron-left"></i> Вернуться ко входу </a>
                </div>
            </form>
            <?php if (isset($_GET['error'])) : ?>
                <p>Неверный пароль</p>
            <?php endif; ?>

        </div>
    </div>

</body>

</html>