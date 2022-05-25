<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/back-end/server/config.php';

    if(isset($_POST['createoffer'])){
        $d1=$_POST['addinternskill'];
        $d2=$_POST['addinterndesc'];
        $d3=$_POST['addinternduration'];
        $d4=$_POST['addinternsalary'];
        $d6=$_POST['addinternstartdate'];
        $d7=$_POST['addinternendingdate'];
        $d8=$_POST['addinternstudent'];
        $d9=$_POST['addinternoffername'];
        $d10=$_POST['addinterncompanyname'];

        $insert = $db->prepare('
            CALL addoffer(:addinternskill, :addinterndesc, :addinternduration, :addinternsalary, :addinterndate, :addinternstartdate, :addinternendingdate, :addinternstudent, :addinternoffername, :addinterncompanyname);'
        );

        $insert->execute(array(
            'addinternskill' => $d1,
            'addinterndesc' => $d2,
            'addinternduration' => $d3,
            'addinternsalary' => $d4,
            'addinterndate' => date('y-m-d h:i:s'),
            'addinternstartdate' => $d6,
            'addinternendingdate' => $d7,
            'addinternstudent' => $d8,
            'addinternoffername' => $d9,
            'addinterncompanyname' => $d10,
        ));
    }

    


?>