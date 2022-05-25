<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/back-end/server/config.php';

    
$address = $_POST['addresslist'];
    $skill = $_POST["main-skill"];
    $description = $_POST["internship-description"];
    $duration = $_POST["internship-duration"];
    $salary = $_POST["companylist"];
    $startdate = $_POST["companylist"];
    $enddate = $_POST["companylist"];
    $amount = $_POST["companylist"];

    $insert = $db->prepare('CALL AddOffer(:address, :skill, :description, :duration, :salary, :startdate, :enddate, :amount);');
    $insert->execute(array(
        'address' => $address,
        'skill' => $skill,
        'description' => $description,
        'duration' => $duration,
        'salary' => $salary,
        'startdate' => $startdate,
        'enddate' => $enddate,
        'amount' => $amount,
    ));
    
    $data = $check->fetchAll();
?>