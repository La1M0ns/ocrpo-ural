<?php
$program_id = $_GET['program_id'];

//если в program_id не число, остановим скрипт
if (!is_numeric($program_id))

    exit();

require_once 'header.php';

//получаем массив поста
$program = get_program_by_id($program_id);
?>
<div class="main">
	<div class="container">
		<div class="sub-container">
			<h3><?=$program['name']?></h3>
			<br>
			<div class="content">
				<div class="content-img">
					<img src="<?=$program['path']?>" class="program-img">
				</div>
				<div class="content-text">
				    <?php
						if ($Announcement = $program['Announcement'] ) {
								echo "<p class='Announcement'>$Announcement</p>";
						} else {

						}
					?>
					<?php
						if ($Audience_category = $program['Audience_category'] ) {
								echo "<p><b>Категория слушателей:  </b>$Audience_category</p>";
						} else {

						}
					?>
					<?php
						if ($Equipment = $program['Equipment'] ) {
								echo "<p><b>Оборудование используемое для реализации программы:  </b>$Equipment</p>";
						} else {

						}
					?>
					<?php
						if ($Hours = $program['Hours'] ) {
								echo "<p><b>Кол-во часов:  </b>$Hours</p>";
						} else {

						}
					?>
					<?php
						if ($Form_of_training = $program['form_of_training'] ) {
								echo "<p><b>Форма обучения:  </b>$Form_of_training</p>";
						} else {

						}
					?>
					<a class='form_btn1' href='#popup'>Отправить заявку</a>
					<?php 
						if(isset($_SESSION['username'])) {
								$sql=mysqli_query($link, "SELECT * FROM administrator WHERE '".$_SESSION['username']."'='adilet'");
							if ($result=mysqli_fetch_array($sql)){
									$i =$program['program_id'];
								echo "<a class='form_btn1' href='#popup2'>Редактировать</a>";
						}}
					?><br><br><br>
				</div>
			</div>
		</div>
	</div>
	<?php
		$id_description = $_GET['program_id']; //Запрос на столбец program_id из таблицы description
		$descriptions = get_description_by_program($id_description); //Подключение функции
	?>
    <?php foreach ($descriptions as $description): ?>
		<div class="content2">
			<h4><?=$description['name3']?></h4>
			<pre><?=$description['content2']?></pre>
			<pre><?=$description['price']?></pre><br>
			<a href="#popup" class="form_btn1">Отправить заявку</a>
			<?php 
							if(isset($_SESSION['username'])) {
						$sql=mysqli_query($link, "SELECT * FROM administrator WHERE '".$_SESSION['username']."'='adilet'");
		if ($result=mysqli_fetch_array($sql)){
					$i =$description['id_description'];
					echo "<p><a class='form_btn1' href='deleteLVLProgram.php?id_description=".$i."'>Удалить</a></p>";
							}}
			?>
		</div>
    <?php endforeach; ?>
</div>
<div id="popup" class="popup">
    <a href="#container" class="popup_area"></a>
    <div class="popup_body">
        <div class="popup_content">
            <a href="#container" class="popup_close">X</a>
            <div class="popup_title"><?=$program['name']?></div>
            <div class="popup_text">
                <form action="mail.php" method="POST">
                    <p>Личные данные участника</p>
                    <input class="form_input" type="text" name="name" placeholder="ФИО участника" required>
                    <input class="form_input" type="date" name="date" required>
                    <p>Контактная информация заказчика</p>
                    <input class="form_input" type="text" name="name2" placeholder="ФИО заказчика" required>
                    <input class="form_input" type="text" name="name3" placeholder="Название организации"><br><br>
                    <input class="form_input" type="text" name="number" placeholder="Контактный номер телефона" required>
                    <input class="form_input" type="text" name="email" placeholder="Электронная почта" required><br><br>
                    <input class="form_btn1" type="submit" value="Отправить заявку">
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
	if(isset($_SESSION['username'])) {
		$sql=mysqli_query($link, "SELECT * FROM administrator WHERE '".$_SESSION['username']."'='adilet'");
	if ($result=mysqli_fetch_array($sql)){
		$i =$description['id_description'];
		require_once 'popup2.php';
	}}
?>
<?php
//Подключение footer
include_once 'footer.php';
?>