<?php
require_once 'database.php';
require_once 'functions.php';
require 'libs/rb.php';
R::setup( 'mysql:host=localhost; dbname=ocrpo-ural', 'root', '' );
session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])){
        $programss = search($_POST['search-term'], 'programs');
    };

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
					<div class="header1">
						<nav style="position: relative; left: 60px; display: block; margin: 0;">
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
				</div>
			</div>
		</div>
	</header>
	<div class="main">
	<div class="container">
		<div class="block1">
			<div class="block-news">
				<h3>Результат поиска:</h3>
					
					<?php foreach ($programss as $program): ?>
				<div class="news">
					<div class="content-block">
						<div class="sub-content-block">
							<a>
								<img src="<?=$program['path']?>" class="post-img">
							</a>
						</div>
            	</div>
            	<div class="sub-content-block1">
                  <h4 style="margin-top: 0px;"><a style="text-decoration: none;color: #3b3f42;" href="/program.php?program_id=<?=$program['program_id']?>"><?=$program['name']?></a></h4>
						<p>
                     <?=$program['Announcement']?>
                  </p>
						<div class="btn-block">
							<a class="form_btn1" href="/program.php?program_id=<?=$program['program_id']?>">Подробнее</a>
							<?php 
								if(isset($_SESSION['username'])) {
										$sql=mysqli_query($link, "SELECT * FROM administrator WHERE '".$_SESSION['username']."'='adilet'");
									if ($result=mysqli_fetch_array($sql)){
											$i =$program['program_id'];
									echo "<a class='form_btn1' href='deleteProgram.php?program_id=".$i."'>Удалить</a>";
							}}
							?>
						</div>
                  <br/>
                </div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="block2">
			<?php
            //Подключение функции get_posts()
            $partners = get_partners();
         ?>
			<h3>Наши партнеры</h3>
			<?php foreach ($partners as $partner): ?>
				<div class="image">
					<a href="<?=$partner['link']?>"><img  class="partner" src="<?=$partner['path']?>"></a><hr>
					<?php 
						if(isset($_SESSION['username'])) {
							$sql=mysqli_query($link, "SELECT * FROM administrator WHERE '".$_SESSION['username']."'='adilet'");
						if ($result=mysqli_fetch_array($sql)){
							$i =$partner['id_img_partners'];
							echo "<p><a class='form_btn1' href='deletePartner.php?id_img_partners=".$i."'>Удалить</a></p>";
						}}
					?>
				</div><br>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php
//Подключение footer
include_once 'footer.php';
?>