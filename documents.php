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
				<h3>Внутренние документы</h3>
               <?php
                  //Подключение функции get_documents()
                  $documents = get_documents();
               ?>
               <?php foreach ($documents as $document): ?>
						<div class="documents1">
							<a href="<?=$document['path']?>"><?=$document['name']?></a>
							<?php 
								if(isset($_SESSION['username'])) {
									$sql=mysqli_query($link, "SELECT * FROM administrator WHERE '".$_SESSION['username']."'='adilet'");
								if ($result=mysqli_fetch_array($sql)){
									$i =$document['document_id'];
									echo "<p><a class='form_btn1' href='deleteDocument.php?document_id=".$i."'>Удалить</a></p>";
								}}
							?>
						</div><br>
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