<?php

require_once 'database.php';

$program1_id = $_GET['program_id'];

$result = mysqli_query($link, "DELETE FROM `programs1` WHERE `programs1`.`program_id` = $program1_id");

header('Location: programs1.php');