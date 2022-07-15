<?php

require_once 'database.php';

$id_description = $_POST['id_description'];
$program_id = $_POST['program_id'];
$name3 = $_POST['name3'];
$content2 = $_POST['content2'];
$price = $_POST['price'];

$result = mysqli_query($link,"UPDATE `description1` SET `program_id` = '$program_id', `name3` = '$name3', `content2` = '$content2', `price` = '$price' WHERE `description`.`id_description` = $id_description");

//$result = mysqli_query($link,"UPDATE `description` SET `program_id` = '$program_id', `name3` = '$name3', `content2` = '$content2', `price` = '$price' WHERE `description`.`id_description` = $id_description");

header('Location: programs1.php');