<?php
require_once 'database.php';
require_once 'functions.php';
require 'libs/rb.php';
R::setup( 'mysql:host=localhost; dbname=h91228l3_test', 'h91228l3_test', 'Qazwsxedc12345');
session_start();
?>
<!doctype html>
<html lang="ru">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <title>Технопарк</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
	<header>
		<div class="head">
			<div class="sub-head">
				<div class="sub-sub-head1">
					<div class="logo">
						<a href="http://h91228l3.beget.tech/">
							<img src="images/logo.png">
						</a>
					</div>
<form action="search.php" method="post" class="poisk">
    <div class="block-users">
							<?php
								if(isset($_SESSION['username'])) {
									$user = $_SESSION['username'];
									echo " Ваше имя: $user ";
									echo '<a class="form_btn1" href="logout.php" style="margin-left: 0px;">Выйти</a>';
								} else { 
								}
							?>
						</div>
	<input name="search-term" class="poisk_input" type="text" placeholder="Искать здесь...">
	<p class="poisk_btn" type="submit"></p>
</form><br><br><br>
				</div>
				<div class="sub-sub-head2">
					<div class="header">
						<nav>
								<ul class="topmenu">
								<li><a href="http://h91228l3.beget.tech/">Главная</a></li>
								<li><a>Об учебном центре</a>
									<ul class="submenu">
										<li><a href="Положение об Учебном центре МЦК_2016.09.pdf">Положение</a></li>
										<li><a href="Оргструктура УЦ МЦК (7 отделений).pdf">Организационная структура</a></li>
										<li><a href="sotrudniki.php">Сотрудники</a></li>
										<li><a href="plan.php">План работы</a></li>
										<li><a href="documents.php">Внутренние документы</a></li>
									</ul>
								</li>
								<li><a>Программы</a>
									<ul class="submenu3">
										<li><a href="programs.php">для педагогических и руководящих работников Свердловской области</a></li>
										<li><a href="programs1.php">для организаций/предприятий и физических лиц</a></li>
									</ul></li>
								<li><a href="news.php">Архив новостей</a></li>
								<li><a href="contacts.php">Контакты</a></li>
								<?php 
										if(isset($_SESSION['username'])) {
										$sql=mysqli_query($link, "SELECT * FROM administrator WHERE '".$_SESSION['username']."'='adilet'");
							if ($result=mysqli_fetch_array($sql)){
									echo '<li><a href="admin.php">Панель управления</a></li>';

										}
									}
									?>
								</ul>
						</nav>
					</div>
					<div class="header1">
						<nav>
							<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
							<p class="btn3"></p>
							<div class="block_with_text" style="display: none;">
								<ul class="topmenu1">
									<li><a href="http://h91228l3.beget.tech/">Главная</a></li>
									<li><a>Об учебном центре</a>
										<ul class="submenu1">
											<li><a href="Положение об Учебном центре МЦК_2016.09.pdf">Положение</a></li>
											<li><a href="Оргструктура УЦ МЦК (7 отделений).pdf">Организационная структура</a></li>
											<li><a href="sotrudniki.php">Сотрудники</a></li>
											<li><a href="plan.php">План работы</a></li>
											<li><a href="documents.php">Внутренние документы</a></li>
										</ul>
									</li>
									<li><a>Программы</a>
										<ul class="submenu2">
											<li><a href="programs.php">для педагогических и руководящих работников Свердловской области</a></li>
											<li><a href="programs1.php">для организаций/предприятий и физических лиц</a></li>
										</ul></li>
									</li>
									<li><a href="news.php">Архив новостей</a></li>
									<li><a href="contacts.php">Контакты</a></li>
										<?php 
											if(isset($_SESSION['username'])) {
												$sql=mysqli_query($link, "SELECT * FROM administrator WHERE '".$_SESSION['username']."'='adilet'");
											if ($result=mysqli_fetch_array($sql)){
												echo '<li><a href="admin.php">Панель управления</a></li>';
												}
											}
										?>
								</ul>
							</div>
								<script type="text/javascript">
									$('.btn3').click(function(){
										$(".block_with_text").fadeToggle(100);
									}); 
								</script>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>