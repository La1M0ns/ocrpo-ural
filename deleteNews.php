<?php

require_once 'database.php';

$posts = $_GET['post_id'];

$result = mysqli_query($link, "DELETE FROM `posts` WHERE `posts`.`post_id` = $posts");

header('Location: index.php');