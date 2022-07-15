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
			<div class="slider">
				<input checked="" type="radio" name="respond" id="desktop">
				<article id="slider">
					<input checked="" type="radio" name="slider" id="switch1">
					<input type="radio" name="slider" id="switch2">
					<input type="radio" name="slider" id="switch3">
					<input type="radio" name="slider" id="switch4">
					<input type="radio" name="slider" id="switch5">
					<div id="slides">
						<div id="overflow">
							<div class="image">
								<?php
									//Подключение функции get_posts()
									$photos_on_slider = get_photos_on_slider();
								?>
								<?php foreach ($photos_on_slider as $photo_on_slider): ?>
								<article><img src="<?=$photo_on_slider['path']?>"></article>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
					<div id="controls">
						<label for="switch1"></label>
						<label for="switch2"></label>
						<label for="switch3"></label>
						<label for="switch4"></label>
						<label for="switch5"></label>
					</div>
					<div id="active">
						<label for="switch1"></label>
						<label for="switch2"></label>
						<label for="switch3"></label>
						<label for="switch4"></label>
						<label for="switch5"></label>
					</div>
				</article>
			</div>
			<div class="block-news">
				<h3>Лента новостей</h3>
				<?php
                //Подключение функции get_posts()
                $posts = get_posts1();
            ?>
            <?php foreach ($posts as $post): ?>
				<div class="news">
					<div class="content-block">
						<div class="sub-content-block">
							<a>
								<img src="<?=$post['path']?>" class="post-img">
							</a>
						</div>
            	</div>
            	<div class="sub-content-block1">
               <a style="white-space: pre-wrap;"><?=$post['content']?></a>
						<?php 
							if(isset($_SESSION['username'])) {
								$sql=mysqli_query($link, "SELECT * FROM administrator WHERE '".$_SESSION['username']."'='adilet'");
							if ($result=mysqli_fetch_array($sql)){
								$i =$post['post_id'];
								echo "<p><a class='form_btn1' href='deleteNews.php?post_id=".$i."'>Удалить</a></p>";
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