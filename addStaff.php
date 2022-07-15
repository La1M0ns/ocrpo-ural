<?php

require_once 'database.php';

$name = $_POST['name'];
$position = $_POST['position'];
$kabinet = $_POST['kabinet'];
$number = $_POST['number'];
$email = $_POST['email'];
$uploadname=basename($_FILES['file']['name']);//записываем имя файла
$uploadpath='images/'.$uploadname; //указываем куда грузить файл
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadpath)) { //перемещение загруженного файла из временной папки сервера в папку, которую указали (uploadpath)
		  $result = mysqli_query($link,"INSERT INTO `staff` (`name`, `position`, `kabinet`, `number`, `email`,`image`) VALUES ('$name', '$position', '$kabinet', '$number', '$email', '$uploadpath')"); //составляем запрос на запись в базу имя и путь к файлу
        header('Location: sotrudniki.php');
    }
    else echo 'Ошибка';