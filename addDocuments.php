<?php

require_once 'database.php';

$name = $_POST['name'];
$uploadname=basename($_FILES['file']['name']);//записываем имя файла
$uploadpath='images/'.$uploadname; //указываем куда грузить файл
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadpath)) { //перемещение загруженного файла из временной папки сервера в папку, которую указали (uploadpath)
		  $result = mysqli_query($link,"INSERT INTO `documents` (`name`,`path`) VALUES ('$name', '$uploadpath')"); //составляем запрос на запись в базу имя и путь к файлу
        header('Location: documents.php');
    }
    else echo 'Ошибка';