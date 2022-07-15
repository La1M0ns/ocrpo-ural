<div id="popup1" class="popup">
    <a href="#container" class="popup_area"></a>
    <div class="popup_body">
        <div class="popup_content">
            <a href="#container" class="popup_close">X</a>
            <div class="popup_title">Программа обучения</div>
            <div class="popup_text">
				<form action="createProgram1.php" method="post" enctype="multipart/form-data">
					<?php
					$program_id = $_GET['program_id'];
					$program1 = mysqli_query($link, "SELECT * FROM `programs1` WHERE `program_id` = '$program_id'");
					$program1 = mysqli_fetch_assoc($program1);
					?>
					<p>Фото</p>
					<input type="hidden" name="program_id" value="<?=$program1['program_id']?>">
					<input type="file" name="file"><br>
					<p>Название</p>
					<textarea class="form_input" type="text" name="name"><?=$program1['name']?></textarea><br>
					<p>Анонс</p>
					<textarea class="form_input" type="text" name="Announcement"><?=$program1['Announcement']?></textarea><br>
					<p>Категория слушателей</p>
					<textarea class="form_input" type="text" name="Audience_category"><?=$program1['Audience_category']?></textarea><br>
					<p>Оборудование</p>
					<textarea class="form_input" type="text" name="Equipment"><?=$program1['Equipment']?></textarea><br>
					<p>Часы</p>
					<textarea class="form_input" type="text" name="Hours"><?=$program1['Hours']?></textarea><br>
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