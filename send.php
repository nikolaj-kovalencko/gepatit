<?php
if (!$_POST) {
    exit();
}
$pattern = '/^(\+)?\d{10,12}$/';
if (empty($_POST["name"]) && preg_match($pattern, $_POST["phone"])) {
    $to      = 'gepatitt.net@mail.ru';
    $subject = 'Сообщение с сайта gepatitt.net';
    $message = 'Пользователь оставил следующие данные:' . "\r\n";
    foreach ( $_POST as $key => $value ) {
        if($key != 'name') {
            $message = $message . $key . ': ' . "\t" . $value . "\r\n";
        }
    }
    $headers = 'From: admin@gepatitt.net' . "\r\n" .
        'Reply-To: admin@gepatitt.net' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
}

header('Location: https://gepatitt.net/#thanks');
?>
