<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
        <h1>Modifier un dossier d'entreprise</h1>
        <fieldset>
            <form name="inscriptioncompany" method="post" action="companies.php">
                Mail du User à modifier : <input type="text" name="oldeuseremail"/>
                Username : <input type="text" name="musername"/>
                Nouveau mail : <input type="text" name="musermail"/>
                MDP : <input type="text" name="muserpasswrd"/>
                Prénom : <input type="text" name="muserfirstname"/>
                Nom : <input type="text" name="muserlastname"/>
                Genre : <input type="text" name="musergenre"/>
                Date de naissance : <input type="date" name="muserdate_birth"/>
                Status : <input type="text" name="muserstatus"/>
                Tel : <input type="text" name="muserphone"/>
                Centre CESI : <input type="text" name="musercenter"/>
                Mineure : <input type="text" name="muserminor"/>
                Handicap : <input type="text" name="muserhandicap"/>
                IP : <input type="text" name="muserip"/>
                Photo de profil : <input type="text" name="muserprofilepicture"/>
                Role : <input type="text" name="mrolename"/>
                Classe : <input type="text" name="mclassname"/>
                Ville : <input type="text" name="mcity"/>
                Code postal : <input type="text" name="mzipcode"/>
                Pays : <input type="text" name="mcountry_name"/>
            <input type="submit" name="update" value="OK"/>
            
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

                if(isset($_POST['update'])){
                    $uu1=$_POST['oldeuseremail'];
                    $uu2=$_POST['musername'];
                    $uu3=$_POST['musermail'];
                    $uu4=$_POST['muserpasswrd'];
                    $uu5=$_POST['muserfirstname'];
                    $uu6=$_POST['muserlastname'];
                    $uu7=$_POST['musergenre'];
                    $uu8=$_POST['muserdate_birth'];
                    $uu9=$_POST['muserstatus'];
                    $uu10=$_POST['muserphone'];
                    $uu11=$_POST['musercenter'];
                    $uu12=$_POST['muserminor'];
                    $uu13=$_POST['muserhandicap'];
                    $uu14=$_POST['muserip'];
                    $uu15=$_POST['muserprofilepicture'];
                    $uu16=$_POST['mrolename'];
                    $uu17=$_POST['mclassname'];
                    $uu18=$_POST['mcity'];
                    $uu19=$_POST['mzipcode'];
                    $uu20=$_POST['mcountry_name'];

                    $insert = $conn->prepare('
                        CALL updatecompany(:oldeuseremail, :musername, :musermail, :muserpasswrd, :muserfirstname, :muserlastname, :musergenre, :muserdate_birth, :muserstatus, :muserphone, :musercenter, :muserminor, :muserhandicap, :muserip, :muserprofilepicture, :mrolename, :mclassname, :mcity, :mzipcode, :mcountry_name);');

                    $insert->execute(array(
                        'oldeuseremail' => $uu1,
                        'musername' => $uu2,
                        'musermail' => $uu3,
                        'muserpasswrd' => $uu4,
                        'muserfirstname' => $uu5,
                        'muserlastname' => $uu6,
                        'musergenre' => $uu7,
                        'muserdate_birth' => $uu8,
                        'muserstatus' => $uu9,
                        'muserphone' => $uu10,
                        'musercenter' => $uu11,
                        'muserminor' => $uu12,
                        'muserhandicap' => $uu13,
                        'muserip' => $uu14,
                        'muserprofilepicture' => $uu15,
                        'mrolename' => $uu16,
                        'mclassname' => $uu17,
                        'mcity' => $uu18,
                        'mzipcode' => $uu19,
                        'mcountry_name' => $uu20,

                    ));
                }
                    
            ?>
        </fieldset>
    </body>
</html>