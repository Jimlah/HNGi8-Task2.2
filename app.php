<?php

require_once './vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    // filter input
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $messages = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    
    if (!isset($firstname) || !isset($lastname) || !isset($email) || $email == "" || !isset($messages)) {
    
        $_COOKIE['alert'] = ['status' => false, 'message' => 'Message failed to send!'];

        header('Location: /');
    }

    
    // create email body and send it
    $transport = new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl');
    $transport->setUsername('dufmanigeria@gmail.com')
              ->setPassword('Dufma12345');
    
    $mailer = new Swift_Mailer($transport);
    
    $message = new Swift_Message('Nessage from Resume');
    $message->setFrom(array($email => $firstname . ' ' . $lastname))
    ->setTo(array('abdullahij951@gmail.com' => $firstname . ' ' . $lastname))
    ->setBody('<p>' . $messages . '</p>')
    ->setContentType('text/html');

    $result = $mailer->send($message);

    if ($result) {
       $message =  ['status' => true, 'message' => 'Message sent successfully!'];
    } else {
        $message = ['status' => false, 'message' => 'Message failed to send!'];
    }


    $_COOKIE['alert'] = $message;


    header('Location: /');
}



?>