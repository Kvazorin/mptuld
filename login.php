<?php
session_start();
require_once('config.php');

if (!isset($_SESSION["theme"])) {
	$_SESSION["theme"] = "light";
}

if (isset($_POST['submit'])) {
	if (isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);

		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$sql = "select * from members where email = :email ";
			$handle = $pdo->prepare($sql);
			$params = ['email' => $email];
			$handle->execute($params);
			if ($handle->rowCount() > 0) {
				$getRow = $handle->fetch(PDO::FETCH_ASSOC);
				if (password_verify($password, $getRow['password'])) {
					unset($getRow['password']);
					$_SESSION = $getRow;
					$_SESSION['access'] = TRUE;
					header("location: http://127.0.0.1/dashboard.php");
					exit();
				} else {
					$errors[] = "Неверный Email или Пароль";
				}
			} else {
				$errors[] = "Неверный Email или Пароль";
			}
		} else {
			$errors[] = "Неверный Email";
		}
	} else {
		$errors[] = "Необходимо ввести Email и Пароль";
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
			?>

			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<div class="f_header">
					<p>Вход</p>
				</div>

				<div class="footer_heading">
					<label for="email">Email:</label>
					<input type="text" name="email" placeholder="Email" autocomplete="off">
				</div>
				<div class="footer_heading">
					<label for="email">Введите пароль:</label>
					<input type="password" name="password" placeholder="Пароль">
				</div>


				<button type="submit" name="submit" class="form_btn">Войти</button>
				<button class="form_btn"><a href="register.php">Регистрация</a></button>

				<div class="go_back">
					<a href="index.php" class="go_back"><i class="fa-solid fa-chevron-left"></i> На Главную </a>
				</div>

			</form>


		</div>
	</div>
</body>

</html>