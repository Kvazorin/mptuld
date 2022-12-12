<?php

if (!isset($_SESSION["theme"])) {
	$_SESSION["theme"] = "light";
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

			<form action="php-handler/auth.php" method="POST">
				<div class="f_header">
					<p>Вход</p>
				</div>

				<div class="footer_heading">
					<label for="email">Логин:</label>
					<input type="text" name="login" placeholder="Введите логин" autocomplete="off">
				</div>
				<div class="footer_heading">
					<label for="email">Email:</label>
					<input type="text" name="email" placeholder="Введите email" autocomplete="off">
				</div>
				<div class="footer_heading">
					<label for="email">Введите пароль:</label>
					<input type="password" name="password" placeholder="Пароль">
				</div>


				<button type="submit" type="submit" class="form_btn">Войти</button>
				<button class="form_btn"><a href="php-handler/register.php">Регистрация</a></button>

				<div class="go_back">
					<a href="index.php" class="go_back"><i class="fa-solid fa-chevron-left"></i> На Главную </a>
				</div>

			</form>

			<?php if (isset($_GET['error'])) : ?>
				<p>Неверный пароль</p>
			<?php endif; ?>

		</div>
	</div>
</body>

</html>