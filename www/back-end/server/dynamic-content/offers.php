<?php
require $_SERVER['DOCUMENT_ROOT'].'/back-end/server/config.php';
    
$check = $db->prepare('SELECT * FROM Company AS Comp
                       INNER JOIN to_locate AS locate ON Comp.company_id = locate.company_id 
                       INNER JOIN Address AS A on A.location_id = locate.location_id
                       INNER JOIN Internship_management AS intern ON intern.location_id = A.location_id
                       LEFT JOIN to_correspond ON to_correspond.location_id = 	A.location_id 
                       LEFT JOIN City on City.city_id = to_correspond.city_id
                       ORDER BY internship_offer_date DESC;');
$check->execute();  
$data = $check->fetchAll();

foreach ($data as $row)  
{
?>

<div class="offer">
    <h3 class="offer-name"><?php echo $row['internship_offer_name'];?></h3>
    <h4>Description</h4>
    <h5 class="offer-skills">Skills</h5>
    <h6>Location</h6>
    <button type="button" class="offer-button">View offer</button>
    <img src="https://images.unsplash.com/photo-1647659557479-4245615987b3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
        alt="Logo of the company">
    <form action="./back-end/server/dynamic-content/whishlist.php" method="POST">
        <input type="hidden" name="internship_id" id="internship_id" value=<?php echo $row['internship_offer_id']; ?>>
        <input type="submit" class="wishlist-add" value="⭐ Add to your wishlist"></input>
    </form>
</div>


<div class="cont-offer-descripton">
    <div class="offer-description">
        <div class="closer">
            <div class="cross"></div>
            <div class="cross"></div>
        </div>
        <h3><?php echo $row['company_name'];?></h3>
        <h4><?php echo $row['company_description'];?></h4>
        <form action="../back-end/server/mail/apply-mail.php" method="POST" enctype="multipart/mixed">
            <input type="text" name="lastnameapply" id="lastnameapply" placeholder="Your last name">
            <input type="text" name="firstnameapply" id="firstnameapply" placeholder="Your first name">
            <input type="text" name="emailapply" id="emailapply" placeholder="Your email">
            <input type="text" name="subject-apply" id="subject-apply" placeholder="Subject">
            <label for="message">Votre demande</label>
            <textarea name="message-apply" rows="2" cols="50" required></textarea>
            <label for=' fichier'>Ajouter une pièce jointe <span>(jpeg ou pdf, max 2Mo)</span></label>
            <input type="file" name="resumepdf" class="fileresume">
            <input type="submit" value="Send" class="submit-mail-company">
        </form>
    </div>
</div>



<?php
}   
?>