<?php 

$name = $_POST['user_name'];
$email = $_POST['user_email'];
$text = $_POST['user_text'];


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
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Сообщение из формы со страницы "Контакты" - Wentop';
$mail->Body    = '
	Пользователь оставил данные <br> 
	Ф.И.O: ' . $name . ' <br> 
	Эл почта: ' . $email . ' <br> 
	Сообщение: ' . $text . '<br>';
$mail->AltBody = 'Это альтернативный текст';

if(!$mail->send()) {
    echo "Error";
} else {
    return true;
    echo "Er";
}

?>