<?php
require $_SERVER['DOCUMENT_ROOT'].'/back-end/server/config.php';
    
$check = $db->prepare('SELECT * FROM company ORDER BY company_number_like DESC;');
$check->execute();  
$data = $check->fetchAll();

foreach ($data as $row)  
{
?>

<div class="company">
    <h3 class="company-name"><?php echo $row['company_name'];?></h3>
    <h4><?php echo $row['company_description'];?></h4>
    <button type="button" class="company-button">View company</button>
    <img src="https://images.unsplash.com/photo-1647659557479-4245615987b3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
        alt="Logo of the company">
    <input type="hidden" name="like-count-val" id="like-count-val" value=<?php echo $row['company_number_like'];?>>
    <?php $companyname = $row['company_name'];?>


    <form action="" method="POST">
        <input type="hidden" name="likenamecompany" id="likenamecompany" value=<?php echo $companyname; ?>>
        <!-- <input type="submit" class="like-count" value=<?php echo "❤️". $row['company_number_like'];?>></input> -->
    </form>

    <form action="./back-end/server/dynamic-content/companies-like.php" method="post">
        <input type="hidden" name="likenamecompany" id="likenamecompany" value=<?php echo $companyname; ?>>
        <input type="submit" class="like-count" value=<?php echo "❤️". $row['company_number_like'];?>></input>
    </form>
</div>


<div class="cont-company-descripton">
    <div class="company-description">
        <div class="closer">
            <div class="cross"></div>
            <div class="cross"></div>
        </div>
        <h3><?php echo $row['company_name'];?></h3>
        <h4><?php echo $row['company_description'];?></h4>

        <?php  if(isset($_SESSION['student'])) {
        ?> <form method="post" action="./back-end/server/companies/deletecompany.php">
            <input type="hidden" name="delname" value=<?php echo $row["company_name"]; ?>>
            <input type="submit" name="delete" value="Delete" /><br><br>
        </form>


        <?php } ?>
    </div>
</div>



<?php
}   
?>