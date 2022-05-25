<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/back-end/server/config.php';

// class Users {
//     $private pseudo;
//     $private email;
//     $private password;
//     function __construct(string $pseudo, string $email, string $private) {
//         $this->pseudo = $pseudo;
//         $this->email = $email;
//         $this->private = $private;
//     }
// }


    
$check = $db->prepare('SELECT * FROM users;');
$check->execute();
$data = $check->fetchAll();
$val = 0;

foreach ($data as $row)  
{
?>

<section class="student">
    <div class="student-content">
        <h3>• <?php echo $row['user_username'];?></h3>
        <h4>Web developper</h4>
        <h5>Location</h5>
        <h5>years old</h5>
    </div>
    <button>View profile</button>
    <div class="student-image">
        <?php echo '<img src="data:image/png;base64,'.base64_encode($data[$val]['user_profile_picture']).'">'?>
    </div>

</section>

<!-- $User1 = new Users($row['user_username'], $row['user_email'], $row['user_password']); -->

<?php 
    $val += 1; 
    }
?>