<?php

require_once 'database.php';

$name = $_POST['name'];
$Announcement = $_POST['Announcement'];
$Audience_category = $_POST['Audience_category'];
$Equipment = $_POST['Equipment'];
$Hours = $_POST['Hours'];
$form_of_training = $_POST['form_of_training'];
$uploadname=basename($_FILES['file']['name']);//записываем имя файла
$uploadpath='images/'.$uploadname; //указываем куда грузить файл
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadpath)) { //перемещение загруженного файла из временной папки сервера в папку, которую указали (uploadpath)
		  $result = mysqli_query($link,"INSERT INTO `programs` (`name`, `Announcement`, `Audience_category`, `Equipment`, `Hours`, `form_of_training`,`path`) VALUES ('$name', '$Announcement', '$Audience_category', '$Equipment', '$Hours', '$form_of_training', '$uploadpath')"); //составляем запрос на запись в базу имя и путь к файлу
        header('Location: programs.php');
    }
    else echo 'Ошибка';