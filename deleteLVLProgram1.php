<?php

require_once 'database.php';

$descriptions = $_GET['id_description'];

$result = mysqli_query($link, "DELETE FROM `description1` WHERE `description1`.`id_description` = $descriptions");

header('Location: programs1.php');