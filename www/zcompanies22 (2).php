<html>

<head>
    <title>Companies</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="cours.css">
</head>

<body>
    <H1>Créer un dossier d'entreprise</h1>
    <fieldset>

    </fieldset>

    <h1>Supprimer un dossier</h1>
    <fieldset>
        <form name="inscriptioncompany" method="post" action="companies.php">
            Nom : <input type="text" name="delname" />
            <input type="submit" name="delete" value="OK" /><br><br>
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

                if(isset($_POST['delete'])){
                    $delnom=$_POST['delname'];
        
                    $delete = $conn->prepare('
                        CALL delcompany(:delcompany_name);'
                    );

                    $delete->execute(array(
                        'delcompany_name' => $delnom,
                    ));
                }
                    
            ?>
    </fieldset>


    <H1>Modifier un dossier d'entreprise</h1>
    <fieldset>
        <form name="inscriptioncompany" method="post" action="companies.php">
            Nom : <input type="text" name="firstnomentre" />
            Nouveau nom : <input type="text" name="unomentre" />
            Description : <input type="text" name="udesc" />
            Domaine : <input type="text" name="udomaineentre" /><br />
            Nombre d'étudiants : <input type="text" name="unumetu" />
            Global evaluation : <input type="text" name="ueval" />
            Confiance : <input type="text" name="utrust" />
            Nombre de like : <input type="text" name="ulike" />
            Logo : <input type="text" name="ulogo" /><br />

            Qualité de travail :
            <select name="uqual" id="iduqual">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            Salaire :
            <select name="usalary" id="idusalary">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            Pro :
            <select name="upro" id="idupro">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            Presta :
            <select name="usoci" id="idusoci">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br />

            Pays : <input type="text" name="upays" />
            Ville : <input type="text" name="uville" />
            Code Postal : <input type="text" name="ucpostal" /><br />

            Numéro adresse : <input type="text" name="unumad" />
            Nom de la rue : <input type="text" name="unomad" />
            Nom de la résidence : <input type="text" name="unomres" />
            étage : <input type="text" name="uetage" /><br />
            Télétravail :
            <select name="uteletravail" id="idteletravail">
                <option value="1">Oui</option>
                <option value="2">Non</option>
            </select>

            <input type="submit" name="update" value="OK" />
        </form>

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
                    $fnom=$_POST['firstnomentre'];
                    $unom=$_POST['unomentre'];
                    $udesc=$_POST['udesc'];
                    $udomain=$_POST['udomaineentre'];
                    $unumetu=$_POST['unumetu'];
                    $utrust=$_POST['utrust'];
                    $ueval=$_POST['ueval'];
                    $ulike=$_POST['ulike'];
                    $ulogo=$_POST['ulogo'];

                    $uqual=$_POST['uqual'];
                    $usalary=$_POST['usalary'];
                    $upro=$_POST['upro'];
                    $usoci=$_POST['usoci'];
                    
                
                    $upays=$_POST['upays'];
                    $uville=$_POST['uville'];
                    $ucpostal=$_POST['ucpostal'];

                    $unumad=$_POST['unumad'];
                    $unomad=$_POST['unomad'];
                    $unomres=$_POST['unomres'];
                    $uetage=$_POST['uetage'];
                    $uteletravail=$_POST['uteletravail'];
        
                    $insert = $conn->prepare('
                        CALL updatecompany(:firstcompanyname, :company_name, :company_activity_domain, :company_inter_amount_cesi, :evalglob, 
                        :trust, :company_logo, :nbrlike, :company_description, :qualitywork, :salary, :pro, :social, :location_street_number, :location_street_name, 
                        :location_residence_name, :location_residence_floor, :remote_work, :city_name, :zip_code, :country);');

                    $insert->execute(array(
                        'firstcompanyname' => $fnom,
                        'company_name' => $unom,
                        'company_description' => $udesc,
                        'company_activity_domain' => $udomain,
                        'company_inter_amount_cesi' => $unumetu,
                        'trust' => $utrust,
                        'evalglob' => $ueval,
                        'nbrlike' => $ulike,
                        'company_logo' => $ulogo,

                        'qualitywork' => $uqual,
                        'salary' => $usalary,
                        'pro' => $upro,
                        'social' => $usoci,

                        'location_street_number' => $unumad,
                        'location_street_name' => $unomad,
                        'location_residence_name' => $unomres, 
                        'location_residence_floor' => $uetage, 
                        'remote_work' => $uteletravail,

                        'city_name' => $uville, 
                        'zip_code' => $ucpostal, 
                        'country' => $upays
                    ));
                }
                    
            ?>
    </fieldset>
</body>

</html>