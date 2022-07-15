<?php

require_once 'database.php';

$id_img_partners = $_GET['id_img_partners'];

$result = mysqli_query($link, "DELETE FROM `partners` WHERE `partners`.`id_img_partners` = $id_img_partners");

header('Location: index.php');