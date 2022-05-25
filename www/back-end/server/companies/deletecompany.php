<?php
require $_SERVER['DOCUMENT_ROOT'].'/back-end/server/config.php';

if(isset($_POST['delete'])){
    $delnom=$_POST['delname'];

    $delete = $db->prepare('
        CALL delcompany(:delcompany_name);'
    );

    $delete->execute(array(
        'delcompany_name' => $delnom,
    ));

    header('Location: ../../../companies.php');
}


?>