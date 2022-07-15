<?php

require_once 'database.php';

$name = $_POST['name'];
$number = $_POST['number'];
$email = $_POST['email'];

$result = mysqli_query($link,"INSERT INTO `contacts` (`name`, `number`, `email`) VALUES ('$name', '$number', '$email')");

header('Location: contacts.php');