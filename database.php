<?php

$driver = 'mysql';
$host = 'localhost';
$db_name = 'h91228l3_test';
$db_user = 'h91228l3_test';
$db_pass = 'Qazwsxedc12345';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

try{
    $pdo = new PDO(
        "$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $options
    );
}catch (PDOException $i){
    die("Ошибка подключения к базе данных! Проверье правильность ввода данных!");
}

$link = mysqli_connect('localhost','h91228l3_test','Qazwsxedc12345','h91228l3_test');

if(mysqli_connect_errno())
{
    echo 'Ошибка в подключении к базе данных ('.mysqli_connect_errno().'): '.mysqli_connect_error();
    exit();
} 
?>