<?php

require_once 'database.php';

$document_id = $_GET['document_id'];

$result = mysqli_query($link, "DELETE FROM `documents` WHERE `documents`.`document_id` = $document_id");

header('Location: documents.php');