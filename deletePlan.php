<?php

require_once 'database.php';

$plan_id = $_GET['plan_id'];

$result = mysqli_query($link, "DELETE FROM `plans` WHERE `plans`.`plan_id` = $plan_id");

header('Location: plan.php');