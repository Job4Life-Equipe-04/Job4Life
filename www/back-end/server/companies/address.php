<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/back-end/server/config.php';
    $check = $db->prepare('SELECT * from company NATURAL JOIN Address GROUP BY location_residence_name;');
$check->execute();  
$data = $check->fetchAll();

foreach ($data as $row)  
{
?>

<option value=<?php $row['location_id'] ?>><?php echo $row['location_residence_name']; ?></option>


<?php
}   
?>