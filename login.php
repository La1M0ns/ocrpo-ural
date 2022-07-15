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
		<form action="login.php" class="form-signin" method="POST">
			<h2>Авторизация</h2>
			<input type="text" name="username" class="form_input" placeholder="Username" required>
			<input type="password" name="password" class="form_input" placeholder="Password" required>
			<br><br>
			<input class="form_btn1" name="submit" type="submit" value="Войти">
		</form>
	</div>
</div>
<?php
$data = $_POST;
if( isset($data['submit']) ) {
	$user = R::findOne('administrator', "username = ?", array($data['username']));
	if($user) {
		if(password_verify($data['password'], $user->password) ) {
			//все хорошо, логин пользователя
			$_SESSION['username'] = $user->username;
			echo "<script>alert('Привет,$user->username вы вошли');location.href='index.php';</script>";
		} else {
			echo "<script>alert('Неправильно введен пароль');location.href='login.php';</script>";
		}
	} else {
		echo "<script>alert('Пользователь с таким логином не найден');location.href='login.php';</script>";
	}
}
?>

<?php
//Подключение footer
include_once 'footer.php';

?>