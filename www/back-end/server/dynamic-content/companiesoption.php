<?php 

require_once $_SERVER['DOCUMENT_ROOT'].'/back-end/server/config.php'; $check=$db->prepare('SELECT * FROM company;');
    $check->execute();
    $data = $check->fetchAll();

    foreach ($data as $row)
    {
?>
<option value=<?php echo $row['company_name'] ?>><?php echo $row['company_name']?></option>
<?php
}
?>