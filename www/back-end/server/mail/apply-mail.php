<?php
    require_once('./src/PHPMailer.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $email = new PHPMailer();
    $email->SetFrom($_POST['emailapply'], $_POST['firstnameapply']." ".$_POST['lastnameapply']); 
    $email->Subject = $_POST['subject-apply'];
    $email->Body = $_POST['message-apply'];
    $email->AddAddress('contact@job4life.fr');

    $file_to_attach = $_FILES['resumepdf']['tmp_name'];
    $email->AddAttachment($file_to_attach , 'Resume.pdf' );
    $email->Send();
    header('Location: ../../../../../contact.php?msg=succ');
?>