<?php 
    require $_SERVER['DOCUMENT_ROOT'].'/back-end/server/config.php';
    $check = $db->prepare('SELECT * from company;');
$check->execute();  
$data = $check->fetchAll();

foreach ($data as $row)  
{
?>

<option value=<?php $row['company_id'] ?>><?php echo $row['company_name']; ?></option>

<?php
}   
?>