<?php

require_once 'database.php';

$contact_id = $_GET['contact_id'];

$result = mysqli_query($link, "DELETE FROM `contacts` WHERE `contacts`.`contact_id` = $contact_id");

header('Location: contacts.php');