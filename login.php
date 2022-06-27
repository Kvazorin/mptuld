<?php
session_start();
require_once('config.php');

if(isset($_POST['submit']))
{
	if(isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password']))
	{
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);

		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$sql = "select * from members where email = :email ";
			$handle = $pdo->prepare($sql);
			$params = ['email'=>$email];
			$handle->execute($params);
			if($handle->rowCount() > 0)
			{
				$getRow = $handle->fetch(PDO::FETCH_ASSOC);
				if(password_verify($password, $getRow['password']))
				{
					unset($getRow['password']);
					$_SESSION = $getRow;
					header('location:dashboard.php');
					exit();
				}
				else
				{
					$errors[] = "Неверный Email или Пароль";
				}
			}
			else
			{
				$errors[] = "Неверный Email или Пароль";
			}
			
		}
		else
		{
			$errors[] = "Неверный Email";	
		}

	}
	else
	{
		$errors[] = "Необходимо ввести Email и Пароль";	
	}

}
?>

<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body class="bg-dark">

<div class="container h-100">
	<div class="row h-100 mt-5 justify-content-center align-items-center">
		<div class="col-md-5 mt-5 pt-2 pb-5 align-self-center border bg-light">
			<h1>Вход</h1>
			<?php 
				if(isset($errors) && count($errors) > 0)
				{
					foreach($errors as $error_msg)
					{
						echo '<div class="alert alert-danger">'.$error_msg.'</div>';
					}
				}
			?>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="text" name="email" placeholder="Email" class="form-control">
				</div>
				<div class="form-group">
				<label for="email">Введите пароль:</label>
					<input type="password" name="password" placeholder="Пароль" class="form-control">
				</div>

				<button type="submit" name="submit" class="btn btn-primary">Войти</button>
				
				<a href="register.php" class="btn btn-primary">Регистрация</a>
				<p class="pt-2"><a href="index.php">На главную</a></p>
			</form>
		</div>
	</div>
</div>
</body>
</html>