<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $email = new PHPMailer(true);
    $email->CharSet = "UTF-8";
    $email->setLanguage("ru", "PHPMailer/language/");

    $email->setFrom('tsezelen@gmail.com', 'Tsezelen');
    $email->addAddress('elenatsezelen@gmail.com');
    $email->Subject = 'Новый заказ! '.$_POST['type'].'';
    $body = "Имя пользователя: ".trim(htmlspecialchars($_POST['name']))."\n Номер телефона: ".trim(htmlspecialchars($_POST['phone']))."\n Как и когда удобно связаться: ".trim(htmlspecialchars($_POST['how']));
    $email->Body = $body;
    
    echo $email->send();
?>