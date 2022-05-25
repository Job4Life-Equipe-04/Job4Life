<html>

<head>
    <title>Companies</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="cours.css">
</head>

<body>
    <H1>Créer une offre</h1>
    <fieldset>
        <form name="addoffer" method="post" action="zoffercrud.php">
            Skill requis : <input type="text" name="addinternskill" /><br>
            Description : <input type="text" name="addinterndesc" /><br>
            Durée (semaine) : <input type="text" name="addinternduration" /><br>
            Salaire : <input type="text" name="addinternsalary" /><br>
            Début : <input type="date" name="addinternstartdate" /><br>
            Fin : <input type="date" name="addinternendingdate" /><br>
            Nombre d'étudiants : <input type="text" name="addinternstudent" /><br>
            Nom de l'offre : <input type="text" name="addinternoffername" /><br>
            Nom de l'entreprise (voir onglet company) : <input type="text" name="addinterncompanyname" /><br>
            <input type="submit" name="createoffer" value="OK" />

            <?php
                $servername = 'localhost';
                $username = 'root';
                $password = '';
                try{
                    $conn = new PDO("mysql:host=$servername;dbname=testprojet", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
                die;
                }

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

                    $insert = $conn->prepare('
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
    </fieldset>

    <h1>Supprimer une offre</h1>
    <fieldset>
        <form name="removeroffer" method="post" action="zoffercrud.php">
            Nom : <input type="text" name="deloffername" />
            <input type="submit" name="deleteoffer" value="OK" /><br><br>
            <?php
                $servername = 'localhost';
                $username = 'root';
                $password = '';
                try{
                    $conn = new PDO("mysql:host=$servername;dbname=testprojet", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
                die;
                }

                if(isset($_POST['deleteoffer'])){
                    $delnom=$_POST['deloffername'];
        
                    $delete = $conn->prepare('
                        CALL removeoffer(:remoffer);'
                    );

                    $delete->execute(array(
                        'remoffer' => $delnom,
                    ));
                }
                    
            ?>
    </fieldset>


    <H1>Modifier une offre</h1>
    <fieldset>
        <form name="updateoffer" method="post" action="zoffercrud.php">
            Nom de l'offre à modifier : <input type="text" name="firstinternoffername" /><br>
            Skill requis : <input type="text" name="upinternskill" /><br>
            Description : <input type="text" name="upinterndesc" /><br>
            Durée (semaine) : <input type="text" name="upinternduration" /><br>
            Salaire : <input type="text" name="upinternsalary" /><br>
            Début : <input type="date" name="upinternstartdate" /><br>
            Fin : <input type="date" name="upinternendingdate" /><br>
            Nombre d'étudiants : <input type="text" name="upinternstudent" /><br>
            Nom de l'offre : <input type="text" name="upinternoffername" /><br>
            Nom de l'entreprise (voir onglet company) : <input type="text" name="upinterncompanyname" /><br>
            <input type="submit" name="updateoffer" value="OK" />

            <?php
                $servername = 'localhost';
                $username = 'root';
                $password = '';
                try{
                    $conn = new PDO("mysql:host=$servername;dbname=testprojet", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
                die;
                }

                if(isset($_POST['updateoffer'])){
                    $u1=$_POST['addinternskill'];
                    $u2=$_POST['addinterndesc'];
                    $u3=$_POST['addinternduration'];
                    $u4=$_POST['addinternsalary'];
                    $u6=$_POST['addinternstartdate'];
                    $u7=$_POST['addinternendingdate'];
                    $u8=$_POST['addinternstudent'];
                    $u9=$_POST['addinternoffername'];
                    $u10=$_POST['addinterncompanyname'];
        
                    $insert = $conn->prepare('
                        CALL updatecompany(:firstinternoffername, :addinternskill, :upinterndesc, :upinternduration, :upinternsalary, :upinterndate, :upinternstartdate, :upinternendingdate, :upinternstudent, :upinternoffername, :upinterncompanyname);');

                    $insert->execute(array(
                        'firstcompanyname' => $fnom,
                        'addinternskill' => $fnom,
                        'upinterndesc' => $fnom,
                        'upinternduration' => $fnom,
                        'upinternsalary' => $fnom,
                        'upinterndate' => $fnom,
                        'upinternstartdate' => $fnom,
                        'upinternendingdate' => $fnom,
                        'upinternstudent' => $fnom,
                        'upinternoffername' => $fnom,
                        'upinterncompanyname' => $fnom,
                    ));
                }
                    
            ?>
    </fieldset>
</body>

</html>