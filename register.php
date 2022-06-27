<?php
session_start();
require_once('config.php');

if (!isset($_SESSION["theme"])) {
    $_SESSION["theme"] = "light";
}

if (isset($_POST['submit'])) {
    if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $firstName = trim($_POST['first_name']);
        $lastName = trim($_POST['last_name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $options = array("cost" => 4);
        $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
        $date = date('Y-m-d H:i:s');

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = 'select * from members where email = :email';
            $stmt = $pdo->prepare($sql);
            $p = ['email' => $email];
            $stmt->execute($p);

            if ($stmt->rowCount() == 0) {
                $sql = "insert into members (first_name, last_name, email, `password`, created_at,updated_at) values(:fname,:lname,:email,:pass,:created_at,:updated_at)";

                try {
                    $handle = $pdo->prepare($sql);
                    $params = [
                        ':fname' => $firstName,
                        ':lname' => $lastName,
                        ':email' => $email,
                        ':pass' => $hashPassword,
                        ':created_at' => $date,
                        ':updated_at' => $date
                    ];

                    $handle->execute($params);

                    $success = 'Пользователь был успешно создан';
                } catch (PDOException $e) {
                    $errors[] = $e->getMessage();
                }
            } else {
                $valFirstName = $firstName;
                $valLastName = $lastName;
                $valEmail = '';
                $valPassword = $password;

                $errors[] = 'Email уже занят';
            }
        } else {
            $errors[] = "Неверный Email";
        }
    } else {
        if (!isset($_POST['first_name']) || empty($_POST['first_name'])) {
            $errors[] = 'Необходимо имя пользователя';
        } else {
            $valFirstName = $_POST['first_name'];
        }
        if (!isset($_POST['last_name']) || empty($_POST['last_name'])) {
            $errors[] = 'Необходима фамилия пользователя';
        } else {
            $valLastName = $_POST['last_name'];
        }

        if (!isset($_POST['email']) || empty($_POST['email'])) {
            $errors[] = 'Необходим Email пользователя';
        } else {
            $valEmail = $_POST['email'];
        }

        if (!isset($_POST['password']) || empty($_POST['password'])) {
            $errors[] = 'Необходим пароль пользователя';
        } else {
            $valPassword = $_POST['password'];
        }
    }
}
?>


<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/css/povarov.css">
    <link rel="stylesheet" type="text/css" href="assets/css/<?php echo $_SESSION["theme"]; ?>.css" id="theme_link">

</head>

<body>

    <div class="container">
        <div class="form-centered">

            <?php
            if (isset($errors) && count($errors) > 0) {
                foreach ($errors as $error_msg) {
                    echo '<div class="alert_msg">' . $error_msg . '</div>';
                }
            }

            if (isset($success)) {

                echo '<div class="success_msg">' . $success . '</div>';
            }
            ?>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <!-- <div class="form-group">
            <label for="email">Имя пользователя:</label>
            <input type="text" name="first_name" placeholder="Введите имя" class="form-control" value="<?php echo ($valFirstName ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="email">Фамилия пользователя:</label>
            <input type="text" name="last_name" placeholder="Введите фамилию" class="form-control" value="<?php echo ($valLastName ?? '') ?>">
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" placeholder="Email" class="form-control" value="<?php echo ($valEmail ?? '') ?>">
        </div>
        <div class="form-group">
            <label for="email">Придумайте пароль:</label>
            <input type="password" name="password" placeholder="Пароль" class="form-control" value="<?php echo ($valPassword ?? '') ?>">
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Зарегистрироваться</button>
        <p class="pt-2"><a href="login.php">Вернуться ко входу</a></p> -->

                <div class="f_header">
                    <p>Регистрация</p>
                </div>

                <div class="footer_heading">
                    <label for="email">Имя пользователя:</label><br>
                    <input type="text" name="first_name" placeholder="Введите имя" autocomplete="off" value="<?php echo ($valFirstName ?? '') ?>">
                </div>
                <div class="footer_heading">
                    <label for="email">Фамилия пользователя:</label><br>
                    <input type="text" name="last_name" placeholder="Введите фамилию" autocomplete="off" value="<?php echo ($valLastName ?? '') ?>">
                </div>
                <div class="footer_heading">
                    <label for="email">Email:</label>
                    <input type="text" name="email" placeholder="Email" autocomplete="off" value="<?php echo ($valEmail ?? '') ?>">
                </div>
                <div class="footer_heading">
                    <label for="email">Придумайте пароль:</label>
                    <input type="password" name="password" placeholder="Пароль" autocomplete="off" value="<?php echo ($valPassword ?? '') ?>">
                </div>

                <button type="submit" name="submit" class="form_btn">Зарегистрироваться</button>

                <div class="go_back">
                    <a href="login.php" class="go_back"><i class="fa-solid fa-chevron-left"></i> Вернуться ко входу </a>
                </div>

            </form>
        </div>
    </div>

</body>

</html>