<?php

require_once '../config.php';

$data = array();
header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = clear_str($_POST['name']);
    $mail = clear_str($_POST['mail']);
    $text = clear_str($_POST['text']);
    $recaptcha = $_POST['g-recaptcha-response'];
    $ip = $_SERVER['REMOTE_ADDR'];

    // если не прошли проверку капчу
    if(!check_captcha(SECRET_KEY, $recaptcha, $ip)){
        $data['status'] = "NO";
        $data['mes'] = "Капча заполнена не верно";
    } elseif (empty($name) || empty($mail) || empty($text)){
        $data['status'] = "NO";
        $data['mes'] = "Заполните все поля";
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        $data['status'] = "NO";
        $data['mes'] = "Вы указали не валидный email";
    } else{
        
        $subject_mail = 'Тебе написал '.$name ;
        $message = "Письмо пришло с ".$mail."\n ".$text;

        mail("fenrir.90@mail.ru", $subject_mail, $message);

        $data['status'] = "OK";
        $data['mes'] = "Письмо успешно отправлено";



    }



} else {

    $data['status'] = "NO";
    $data['mes'] = "Некорректное обращение к серверу";

}


echo json_encode($data);
exit;