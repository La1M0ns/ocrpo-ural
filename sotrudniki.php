<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//Подключение шапки
require_once 'header.php';
?>
<div class="main">
	<div class="container">
		<div class="block1">
			<div class="block-news">
				<h3>Сотрудники</h3>
				<?php
               //Подключение функции get_staffs()
               $staffs = get_staffs();
            ?>
            <?php foreach ($staffs as $staff): ?>
				<div class="sotrudnik">
					<div class="content-block">
						<div class="sub-content-block">
							<a>
								<img src="<?=$staff['image']?>" class="sotrudnik-img">
							</a>
						</div>
            	</div>
            	<div class="sub-sotrudnik-block">
						<?php
							if ($name = $staff['name'] ) {
									echo "<h4 style='margin-top: 0px; margin-bottom: 0px;'><p style='text-decoration: none;color: #3b3f42;'>$name</p></h4>";
							} else {

							}
						?>
						<?php
							if ($position = $staff['position'] ) {
									echo "<p>$position</p>";
							} else {

							}
						?>
						<?php
							if ($kabinet = $staff['kabinet'] ) {
									echo "<p>Каб:  $kabinet</p>";
							} else {

							}
						?>
						<?php
							if ($number = $staff['number'] ) {
									echo "<b>Тел:  $number</b>";
							} else {

							}
						?>
						<?php
							if ($email = $staff['email'] ) {
									echo "<p>Почта:  $email</p>";
							} else {

							}
						?>
						<?php 
							if(isset($_SESSION['username'])) {
								$sql=mysqli_query($link, "SELECT * FROM administrator WHERE '".$_SESSION['username']."'='adilet'");
							if ($result=mysqli_fetch_array($sql)){
								$i =$staff['staff_id'];
								echo "<p><a class='form_btn1' href='deleteStaffs.php?staff_id=".$i."'>Удалить</a></p>";
							}}
						?>
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