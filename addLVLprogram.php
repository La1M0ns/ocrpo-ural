<?php

require_once 'database.php';

$program_id = $_POST['program_id'];
$name3 = $_POST['name3'];
$content2 = $_POST['content2'];
$price = $_POST['price'];

$result = mysqli_query($link,"INSERT INTO `description` (`program_id`, `name3`, `content2`, `price`) VALUES ('$program_id', '$name3', '$content2', '$price')");

header('Location: programs.php');