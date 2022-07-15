<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//Подключение шапки
require_once 'header.php';
?>
<div class="main">
	<div style="max-width: 1590px; margin: 0 auto; text-align: center;"><h2>Контактная информация</h2></div>
	<div class="container">
		<div class="contacts">
			<div class="block_with_text1">
				<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ae46bbeca60750a5831e7c239cdf4d012a4ab75cefa10f25c8fb6d700e9d04aa1&amp;source=constructor" width="711" height="400" frameborder="0"></iframe>
				<img src="images/XXL.jpg">
				<img src="images/XL.jpg">
				<img src="images/XXXL.jpg">
			</div>
			<?php
				//Подключение функции get_posts()
				$contacts = get_contacts();
         ?>
         <div>
				<?php foreach ($contacts as $contact): ?>
					<div class="sub-contacts">
						<?php
							if ($name = $contact['name'] ) {
									echo "<b>$name:</b>";
							} else {

							}
						?>
						<?php
							if ($number = $contact['number'] ) {
									echo "<p>тел.: $number</p>";
							} else {

							}
						?>
						<?php
							if ($email = $contact['email'] ) {
									echo "<p>e-mail: $email</p>";
							} else {

							}
						?>
						<?php 
							if(isset($_SESSION['username'])) {
								$sql=mysqli_query($link, "SELECT * FROM administrator WHERE '".$_SESSION['username']."'='adilet'");
							if ($result=mysqli_fetch_array($sql)){
								$i =$contact['contact_id'];
								echo "<p><a class='form_btn1' href='deleteContacts.php?contact_id=".$i."'>Удалить</a></p>";
							}}
						?>
					</div>
				<?php endforeach; ?>
				<div class="sub-contacts">
					<b>Режим и график работы:</b>
					<p>ПН-ЧТ: 8.30-17.30</p>
					<p>ПТ: 8.30-16.30</p>
					<p>СБ-ВС: Выходной</p>
				</div>
				<div class="sub-contacts">
					<b>Как добраться до нас?</b>
					<p>Конечная остановка городского автобусного маршрута  № 25.</p>
					<p>Зоны парковки сервисов ДелиМобиль и YouDrive.</p>
				</div>
      	</div>
		</div>
	</div>
</div>
<?php
//Подключение footer
include_once 'footer.php';
?>