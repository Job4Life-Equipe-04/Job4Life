<?php 
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/back-end/server/config.php';

    $query = $db->prepare('CALL likemanagement(:username, :companyname)');
    $query->execute(array(
    'username'=> $_SESSION['student'],
    'companyname' => $_POST['likenamecompany']
    ));

  header('Location: ../../../../../companies.php');

?>