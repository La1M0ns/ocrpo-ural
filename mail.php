<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['name'];
$date = $_POST['date'];
$name2 = $_POST['name2'];
$name3 = $_POST['name3'];
$number = $_POST['number'];
$email = $_POST['email'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'a_abdumalik@bk.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'n2z2z6vSxHUY3H9mSihE'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('a_abdumalik@bk.ru'); // от кого будет уходить письмо?
$mail->addAddress('v.karma322@gmail.com');     // Кому будет уходить письмо 
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка на обучение';
$mail->Body    = 'ФИО участника:  ' .$name. '<br>Дата рождения:  ' .$date. '<br>ФИО заказчика:  ' .$name2. '<br>Название организации:  ' .$name3. '<br>Контактный номер телефона:  ' .$number. '<br>Электронная почта:  ' .$email;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: programs.php');
}
?>