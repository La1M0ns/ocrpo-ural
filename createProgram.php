<?php

require_once 'database.php';

$program_id = $_POST['program_id'];
$name = $_POST['name'];
$Announcement = $_POST['Announcement'];
$Audience_category = $_POST['Audience_category'];
$Equipment = $_POST['Equipment'];
$Hours = $_POST['Hours'];
$Form_of_training = $_POST['form_of_training'];
$uploadname=basename($_FILES['file']['name']);//записываем имя файла
$uploadpath='images/'.$uploadname; //указываем куда грузить файл
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadpath)) { //перемещение загруженного файла из временной папки сервера в папку, которую указали (uploadpath)
	$result = mysqli_query($link,"UPDATE `programs` SET `name` = '$name', `Announcement` = '$Announcement', `Audience_category` = '$Audience_category', `Equipment` = '$Equipment', `Hours` = '$Hours', `form_of_training` = '$Form_of_training', `path` = '$uploadpath' WHERE `programs`.`program_id` = $program_id"); //составляем запрос на запись в базу имя и путь к файлу
        header('Location: programs.php');
    }
    else echo 'Ошибка';

//$result = mysqli_query($link,"UPDATE `programs` SET `name` = '$name', `name2` = '$name2', `content` = '$content', `Skill_Name` = '$Skill_Name', `kol_programs` = '$kol_programs', `path` = '$uploadpath' WHERE `programs`.`program_id` = $post_id");

header('Location: programs.php');