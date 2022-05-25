<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/back-end/server/config.php';

if(isset($_POST['registration_username']) && isset($_POST['registration_email']) && isset($_POST['registration_password']))
{
    $registration_username = htmlspecialchars($_POST['registration_username']);
    $registration_email = htmlspecialchars($_POST['registration_email']);
    $registration_city = htmlspecialchars($_POST['registration_city']);
    $registration_zip_code = htmlspecialchars($_POST['registration_zipcode']);
    $registration_country = htmlspecialchars($_POST['registration_country']);
    $registration_firstname = htmlspecialchars($_POST['registration_first_name']);
    $registration_lastname = htmlspecialchars($_POST['registration_last_name']);
    $registration_genre = htmlspecialchars($_POST['genre']);
    $registration_birthdate = htmlspecialchars($_POST['birth_date']);
    $registration_status = htmlspecialchars($_POST['statususer']);
    $registration_phone = htmlspecialchars($_POST['user_phone']);
    $registration_center = htmlspecialchars($_POST['user_cesi']);
    $registration_minor = htmlspecialchars($_POST['userminor']);
    $registration_handicap = htmlspecialchars($_POST['handicapuser']);
    $registration_rolename = htmlspecialchars($_POST['rolename']);
    $registration_classname = htmlspecialchars($_POST['classname']);

    $registration_password = htmlspecialchars($_POST['registration_password']);
    $registration_password_retype = htmlspecialchars($_POST['registration_password_retype']);
    $registration_picture = $_FILES["profilpic"]["tmp_name"];
    $check = $db->prepare('SELECT user_username, user_email, user_password FROM users WHERE user_email = ?');
    $check->execute(array($registration_email));
    $data = $check->fetch();
    $row = $check->rowCount();

    if($row === 0) 
    {
        if(strlen($registration_username) <=50) {
            if(strlen($registration_email) <= 100) {
                if (filter_var($registration_email, FILTER_VALIDATE_EMAIL)) {
                    if($registration_password == $registration_password_retype) 
                    {
                        $registration_password = password_hash($registration_password, PASSWORD_BCRYPT, ['cost' => 12]);
                        $ip = $_SERVER['REMOTE_ADDR'];
                    
                      $insert = $db->prepare('CALL addUsers(:city, :zipcode, :country, :pseudo, :email, :password, :userfirstname, :userlastname, :usergenre, :userdate_birth, :userstatus, :userphone, :usercenter, :userminor, :userhandicap, :ip, :picture, :rolename, :classname);');
                      $insert->execute(array(
                          'city' => $registration_city,
                          'zipcode' => $registration_zip_code,
                          'country' => $registration_country,
                          'pseudo' => $registration_username,
                          'email' => $registration_email,
                          'password' => $registration_password,
                          'userfirstname' => $registration_firstname,
                          'userlastname' => $registration_lastname,
                          'usergenre' => $registration_genre,
                          'userdate_birth' => $registration_birthdate,
                          'userstatus' => $registration_status,
                          'userphone' => $registration_phone,
                          'usercenter' => $registration_center,
                          'userminor' => $registration_minor,
                          'userhandicap' => $registration_handicap,
                          'ip' => $ip,
                          'picture' => file_get_contents($registration_picture),
                          'rolename' => $registration_rolename,
                          'classname' => $registration_classname
                      ));
                      
             header('Location: ../../../creation.php?reg_err=success');
}
else {
header('Location: ../../../creation.php?reg_err=password');
}
} else {
header('Location: ../../../creation.php?reg_err=email');
}
}else {
header('Location: ../../../creation.php?reg_err=email_length');
}
} else {
header('Location: ../../../creation.php?reg_err=pseudo_length');
}
} else {
header('Location: ../../../creation.php?reg_err=already');
}

}
?>