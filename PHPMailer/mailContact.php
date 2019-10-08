<?php 

$name = $_POST['user_name'];
$company = $_POST['user_company'];
$phone = $_POST['user_phone'];


require_once('PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['user_file']['name']));
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'alex_semenov_1989@mail.ru';                 // Наш логин
$mail->Password = '1992ABCD';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('alex_semenov_1989@mail.ru', 'Holding Group');   // От кого письмо 
$mail->addAddress('sniper.semenov@ukr.net');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
$mail->addAttachment($_FILES['upload']['tmp_name'], $_FILES['upload']['name']);         // Add attachments

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Сообщение из формы - Holding Group';
$mail->Body    = '
	Пользователь оставил данные <br> 
	Ваше имя: ' . $name . ' <br> 
	Название компании: ' . $company . ' <br> 
	Ваш телефон: ' . $phone . '<br>';
$mail->AltBody = 'Это альтернативный текст';

if(!$mail->send()) {
    echo "Error";
} else {
    return true;
    echo "Er";
}

?>