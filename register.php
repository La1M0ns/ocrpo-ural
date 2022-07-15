<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//Подключение шапки
require_once 'header.php';
?>
<?php protect_page1(); ?>
<div class="sign-block">
	<div class="sub-sign-block">
	<form action="/register.php" class="form-signin" method="POST">
                <h2>Регистрация</h2>
                <input type="text" name="username" class="form_input" placeholder="Username" required>
                <input type="password" name="password" class="form_input" placeholder="Password" required><br><br>
                <input class="form_btn1" name="submit" type="submit" value="Зарегистрироваться">
                <p><a href="login.php">Войти в аккаунт</a></p>
            </form>
	</div>
</div>
<?php

$data = $_POST;
if( isset($data['submit']) ) {

	if( R::count('administrator', "username = ?", array($data['username'])) > 0) {
		echo "<script>alert('Пользователь с таким логином уже существует');location.href='register.php';</script>";
	}

	if( empty($errors) ) {
		//все хорошо, регистрируем
		$user = R::dispense('administrator');
		$user->username = $data['username'];
		$user->password = password_hash($data['password'], PASSWORD_BCRYPT);
		R::store($user);
	} else {
		
	}
}

?>

<?php
//Подключение footer
include_once 'footer.php';

?>