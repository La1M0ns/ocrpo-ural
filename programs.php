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
				<h3>Программы обучения для педагогических и руководящих работников Свердловской области</h3>
            <?php foreach ($programs as $program): ?>
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
				    <p class="Announcement"><?=$program['Announcement']?></p>
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