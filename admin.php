<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//Подключение шапки
require_once 'header.php';
?>
<?php 
  	$sql=mysqli_query($link, "SELECT * FROM administrator WHERE '".$_SESSION['username']."'='adilet'");
   if ($result=mysqli_fetch_array($sql)){

   } else {
		echo "<script>alert('Вы не админ');location.href='index.php';</script>";        
	}
?>
<div class="main">
	<div class="container">
		<div class="sub-sub-container1">
			<h3>Выберите что хотите добавить:</h3>
			<ul class="add">
            <li><a href="#popup">Программа обучения для педагогических и руководящих работников Свердловской области</a></li>
				<li><a href="#popup9">Программа обучения для организаций/предприятий и физических лиц</a></li>
            <li><a href="#popup1">Уровень обучения для программ обучений для педагогических и руководящих работников Свердловской области</a></li>
				<li><a href="#popup10">Уровень обучения для программ обучений для организаций/предприятий и физических лиц</a></li>
            <li><a href="#popup2">Новость</a></li>
            <li><a href="#popup3">Партнер</a></li>
            <li><a href="#popup4">Сотрудник</a></li>
				<li><a href="#popup5">Контакты</a></li>
				<li><a href="#popup6">План работы</a></li>
				<li><a href="#popup7">Внутренний документ</a></li>
				<li><a href="#popup8">Фото на слайдер</a></li>
         </ul>
		</div>
	</div>
</div>
<div id="popup" class="popup">
    <a href="#container" class="popup_area"></a>
    <div class="popup_body">
        <div class="popup_content">
            <a href="#container" class="popup_close">X</a>
            <div class="popup_title">Добавить программу обучения для педагогических и руководящих работников Свердловской области</div>
            <div class="popup_text">
					<form action="addPrograms.php" method="post" enctype="multipart/form-data">
						<p>Фото</p>
						<input type="file" name="file"><br><br>
						<p>Название</p>
						<textarea class="form_input" type="text" name="name"></textarea><br>
						<p>Анонс</p>
						<textarea class="form_input" type="text" name="Announcement"></textarea><br>
						<p>Категория слушателей</p>
						<textarea class="form_input" type="text" name="Audience_category"></textarea><br>
						<p>Оборудование</p>
						<textarea class="form_input" type="text" name="Equipment"></textarea><br>
						<p>Часы</p>
						<textarea class="form_input" type="text" name="Hours"></textarea><br>
						<p>Форма обучения</p>
						<select class="form_input" name="form_of_training">
						<?php
							//Подключение функции get_posts()
							$form_of_trainings = get_form_of_training();
						?>
						<?php foreach ($form_of_trainings as $form_of_training): ?>
						<option class="form_input"><?=$form_of_training['form_of_training']?></option>
						<?php endforeach; ?>
						</select><br><br><br>
						<input class="form_btn1" type="submit" value="Добавить"></input>
					</form>
            </div>
        </div>
    </div>
</div>
<div id="popup1" class="popup">
    <a href="#container" class="popup_area"></a>
    <div class="popup_body">
        <div class="popup_content">
            <a href="#container" class="popup_close">X</a>
            <div class="popup_title">Добавить уровень обучения для программ обучений для педагогических и руководящих работников Свердловской области</div>
            <div class="popup_text">
					<form action="addLVLprogram.php" method="post">
						<p>Выберите программу</p>
						<select class="form_input" name="program_id">
							<?php
								//Подключение функции get_posts()
								$programs = get_programs();
							?>
							<?php foreach ($programs as $program): ?>
							<option value="<?=$program['program_id']?>"><?=$program['name']?></option>
							<?php endforeach; ?>
						</select><br>
						<p>Название</p>
						<textarea class="form_input" type="text" name="name3"></textarea><br>
						<p>Описание</p>
						<textarea class="form_input" type="text" name="content2"></textarea><br>
						<p>Цена</p>
						<textarea class="form_input" type="text" name="price"></textarea><br>
						<br><br>
						<input class="form_btn1" type="submit" value="Добавить"></input>
					</form>
            </div>
        </div>
    </div>
</div>
<div id="popup2" class="popup">
    <a href="#container" class="popup_area"></a>
    <div class="popup_body">
        <div class="popup_content">
            <a href="#container" class="popup_close">X</a>
            <div class="popup_title">Добавить новость</div>
            <div class="popup_text">
					<form action="addNews.php" method="post" enctype="multipart/form-data">
						<p>Фото</p>
						<input type="file" name="file"><br><br>
						<p>Описание</p>
						<textarea class="form_input" type="text" name="content"></textarea><br>
						<br><br>
						<input class="form_btn1" type="submit" value="Добавить"></input>
					</form>
            </div>
        </div>
    </div>
</div>
<div id="popup3" class="popup">
    <a href="#container" class="popup_area"></a>
    <div class="popup_body">
        <div class="popup_content">
            <a href="#container" class="popup_close">X</a>
            <div class="popup_title">Добавить партнера</div>
            <div class="popup_text">
					<form action="addPartner.php" method="post" enctype="multipart/form-data">
						<p>Фото</p>
						<input type="file" name="file"><br><br>
						<p>Ссылка</p>
						<textarea class="form_input" type="text" name="link"></textarea><br><br><br>
						<input class="form_btn1" type="submit" value="Добавить"></input>
					</form>
            </div>
        </div>
    </div>
</div>
<div id="popup4" class="popup">
    <a href="#container" class="popup_area"></a>
    <div class="popup_body">
        <div class="popup_content">
            <a href="#container" class="popup_close">X</a>
            <div class="popup_title">Добавить сотрудника</div>
            <div class="popup_text">
					<form action="addStaff.php" method="post" enctype="multipart/form-data">
						<p>Фото</p>
						<input type="file" name="file"><br><br>
						<p>ФИО</p>
						<textarea class="form_input" type="text" name="name"></textarea><br>
						<p>Должность</p>
						<textarea class="form_input" type="text" name="position"></textarea><br>
						<p>Кабинет</p>
						<textarea class="form_input" type="text" name="kabinet"></textarea><br>
						<p>Номер телефона</p>
						<textarea class="form_input" type="text" name="number"></textarea><br>
						<p>Электронная почта</p>
						<textarea class="form_input" type="text" name="email"></textarea><br>
						<br><br>
						<input class="form_btn1" type="submit" value="Добавить"></input>
					</form>
            </div>
        </div>
    </div>
</div>
<div id="popup5" class="popup">
    <a href="#container" class="popup_area"></a>
    <div class="popup_body">
        <div class="popup_content">
            <a href="#container" class="popup_close">X</a>
            <div class="popup_title">Добавить контакт</div>
            <div class="popup_text">
					<form action="addContact.php" method="post">
						<p>Название</p>
						<textarea class="form_input" type="text" name="name"></textarea><br>
						<p>Номер телефона</p>
						<textarea class="form_input" type="text" name="number"></textarea><br>
						<p>Элетронная почта</p>
						<textarea class="form_input" type="text" name="email"></textarea><br>
						<br><br>
						<input class="form_btn1" type="submit" value="Добавить"></input>
					</form>
            </div>
        </div>
    </div>
</div>
<div id="popup6" class="popup">
    <a href="#container" class="popup_area"></a>
    <div class="popup_body">
        <div class="popup_content">
            <a href="#container" class="popup_close">X</a>
            <div class="popup_title">Добавить план работы</div>
            <div class="popup_text">
					<form action="addPlans.php" method="post" enctype="multipart/form-data">
						<p>Фото</p>
						<input type="file" name="file"><br>
						<p>Название</p>
						<textarea class="form_input" type="text" name="name"></textarea><br><br>
						<input class="form_btn1" type="submit" value="Добавить"></input>
					</form>
            </div>
        </div>
    </div>
</div>
<div id="popup7" class="popup">
    <a href="#container" class="popup_area"></a>
    <div class="popup_body">
        <div class="popup_content">
            <a href="#container" class="popup_close">X</a>
            <div class="popup_title">Добавить внутренний документ</div>
            <div class="popup_text">
					<form action="addDocuments.php" method="post" enctype="multipart/form-data">
						<p>Фото</p>
						<input type="file" name="file"><br>
						<p>Название</p>
						<textarea class="form_input" type="text" name="name"></textarea><br><br>
						<input class="form_btn1" type="submit" value="Добавить"></input>
					</form>
            </div>
        </div>
    </div>
</div>
<div id="popup8" class="popup">
    <a href="#container" class="popup_area"></a>
    <div class="popup_body">
        <div class="popup_content">
            <a href="#container" class="popup_close">X</a>
            <div class="popup_title">Добавить фото на слайдер</div>
            <div class="popup_text">
					<form action="addPhotoOnSlider.php" method="post" enctype="multipart/form-data">
						<p>Фото</p>
						<input type="file" name="file"><br><br>
						<input class="form_btn1" type="submit" value="Добавить"></input>
					</form>
            </div>
        </div>
    </div>
</div>
<div id="popup9" class="popup">
    <a href="#container" class="popup_area"></a>
    <div class="popup_body">
        <div class="popup_content">
            <a href="#container" class="popup_close">X</a>
            <div class="popup_title">Добавить программу обучения для организаций/предприятий и физических лиц</div>
            <div class="popup_text">
					<form action="addPrograms1.php" method="post" enctype="multipart/form-data">
						<p>Фото</p>
						<input type="file" name="file"><br><br>
						<p>Название</p>
						<textarea class="form_input" type="text" name="name"></textarea><br>
						<p>Анонс</p>
						<textarea class="form_input" type="text" name="Announcement"></textarea><br>
						<p>Категория слушателей</p>
						<textarea class="form_input" type="text" name="Audience_category"></textarea><br>
						<p>Оборудование</p>
						<textarea class="form_input" type="text" name="Equipment"></textarea><br>
						<p>Часы</p>
						<textarea class="form_input" type="text" name="Hours"></textarea><br>
						<p>Форма обучения</p>
						<select class="form_input" name="form_of_training">
						<?php
							//Подключение функции get_posts()
							$form_of_trainings = get_form_of_training();
						?>
						<?php foreach ($form_of_trainings as $form_of_training): ?>
						<option class="form_input"><?=$form_of_training['form_of_training']?></option>
						<?php endforeach; ?>
						</select><br><br><br>
						<input class="form_btn1" type="submit" value="Добавить"></input>
					</form>
            </div>
        </div>
    </div>
</div>
<div id="popup10" class="popup">
    <a href="#container" class="popup_area"></a>
    <div class="popup_body">
        <div class="popup_content">
            <a href="#container" class="popup_close">X</a>
            <div class="popup_title">Добавить уровень обучения для программ обучений для организаций/предприятий и физических лиц</div>
            <div class="popup_text">
					<form action="addLVLprogram1.php" method="post">
						<p>Выберите программу</p>
						<select class="form_input" name="program_id">
							<?php
								//Подключение функции get_posts()
								$programs1 = get_programs1();
							?>
							<?php foreach ($programs1 as $program1): ?>
							<option value="<?=$program1['program_id']?>"><?=$program1['name']?></option>
							<?php endforeach; ?>
						</select><br>
						<p>Название</p>
						<textarea class="form_input" type="text" name="name3"></textarea><br>
						<p>Описание</p>
						<textarea class="form_input" type="text" name="content2"></textarea><br>
						<p>Цена</p>
						<textarea class="form_input" type="text" name="price"></textarea><br>
						<br><br>
						<input class="form_btn1" type="submit" value="Добавить"></input>
					</form>
            </div>
        </div>
    </div>
</div>
<?php
//Подключение footer
include_once 'footer.php';
?>