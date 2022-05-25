<?php 
    session_start();
    require $_SERVER['DOCUMENT_ROOT'].'/back-end/server/config.php';


    $query = $db->prepare('CALL addtowishlist(:wluserename, :wlinterid)');
    $query->execute(array(
    'wluserename'=> $_SESSION['student'],
    'wlinterid' => $_POST['internship_id']
    ));

    
    
   header('Location: ../../../../../index.php');


?>