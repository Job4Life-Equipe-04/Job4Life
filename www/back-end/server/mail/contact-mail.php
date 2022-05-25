<?php

    $to = "contact@job4life.fr";
    $subject = $_POST['subjectcontact'];
    $message = $_POST['messagecontact'];
    $headers = "Content-Type: text/plain; charset=utf-8\r\n";
    $headers .= "From: " .$_POST['useremailcontact']."\r\n";
    $headers .= "Reply-To: " .$_POST['useremailcontact']."\r\n";

    if(mail($to, $subject, $message, $headers)) {
        header('Location: ../../../../../contact.php');
    }
?>