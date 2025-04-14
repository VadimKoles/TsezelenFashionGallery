<?php
    $message = "Имя пользователя: ".trim(htmlspecialchars($_POST['name']))."\n Номер телефона: ".trim(htmlspecialchars($_POST['phone']))."\n Дополнительно: ".trim(htmlspecialchars($_POST['how']));
    $type = $_POST["type"];
    $subject = "=?utf-8?B?".base64_encode("Новый заказ из раздела '$type'!")."?=";
    $headers = "From: tsezelen@gmail.com\r\nContent-type: text/html; charset=utf-8\r\n";

    $success = mail("elenatsezelen@gmail.com", $subject, $message, $headers);
    echo $success;
?>