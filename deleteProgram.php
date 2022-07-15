<?php

require_once 'database.php';

$program_id = $_GET['program_id'];

$result = mysqli_query($link, "DELETE FROM `programs` WHERE `programs`.`program_id` = $program_id");

header('Location: programs.php');