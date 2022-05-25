<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/back-end/server/config.php';
    
    if(($_SESSION['student'])) {
        header('Location: ../../../index.php');
    }

  
    $req = $db->prepare('SELECT * FROM users WHERE user_email = ?');
    $req->execute(array($_SESSION['student']));
    $data = $req->fetch();
?>