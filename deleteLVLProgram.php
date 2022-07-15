<?php

require_once 'database.php';

$descriptions = $_GET['id_description'];

$result = mysqli_query($link, "DELETE FROM `description` WHERE `description`.`id_description` = $descriptions");

header('Location: programs.php');