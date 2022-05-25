<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/back-end/server/config.php';



    if(isset($_POST['create'])){
        $nom=$_POST['nomentre'];
        $domain=$_POST['domaineentre'];
        $numetu=$_POST['numetu'];
        $logo= "https://cdn.artphotolimited.com/images/59b65ee9faa2f46b71080369/700x700/girafe-au-dessus-des-nuages.jpg";
        $desc=$_POST['desc'];
    
        $pays=$_POST['pays'];
        $ville=$_POST['ville'];
        $cpostal=$_POST['cpostal'];

        $numad=$_POST['numad'];
        $nomad=$_POST['nomad'];
        $nomres=$_POST['nomres'];
        $etage=$_POST['etage'];
        $teletravail=$_POST['teletravail'];

        $insert = $db->prepare('
            CALL addcompany(:company_name, :company_activity_domain, :company_inter_amount_cesi, :company_logo, :company_description, 
            :location_street_number, :location_street_name, :location_residence_name, :location_residence_floor, :remote_work, 
            :city_name, :zip_code, :country);'
        );

        $insert->execute(array(
            'company_name' => $nom,
            'company_activity_domain' => $domain,
            'company_inter_amount_cesi' => $numetu,
            'company_logo' => $logo,
            'company_description' => $desc,

            'location_street_number' => $numad,
            'location_street_name' => $nomad,
            'location_residence_name' => $nomres, 
            'location_residence_floor' => $etage, 
            'remote_work' => $teletravail,

            'city_name' => $ville, 
            'zip_code' => $cpostal, 
            'country' => $pays
        ));
    }
        



header('Location: ../../../companies.php');
?>