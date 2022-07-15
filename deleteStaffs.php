<?php

require_once 'database.php';

$staff = $_GET['staff_id'];

$result = mysqli_query($link, "DELETE FROM `staff` WHERE `staff`.`staff_id` = $staff");

header('Location: sotrudniki.php');