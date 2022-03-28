<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/back-end/server/config.php';

    if(!empty($_POST['signin-login']) && !empty($_POST['signin-password']))
    {
        $login = htmlspecialchars($_POST['signin-login']);
        $password = htmlspecialchars($_POST['signin-password']);
        $login = strtolower($login);

        $check = $db->prepare('SELECT * FROM users 
                               NATURAL JOIN to_have 
                               NATURAL JOIN roles
                               WHERE users.user_email = ?');
        $check->execute(array($login));
        $data = $check->fetch(PDO::FETCH_OBJ);
        $row = $check->rowCount();        
  
        if($row > 0) {
            if(filter_var($login, FILTER_VALIDATE_EMAIL))
            {
                if(password_verify($password, $data->user_password))
                {
                    if(strtolower($data->role_name) == "student") {
                        $_SESSION['student'] = $data->user_username; 
                    }
                    } else if (strtolower($data->role_name) == "admin") {
                        $_SESSION['admin'] = $data->user_username;
                    } else if (strtolower($data->role_name) == "pilot") {
                        $_SESSION['pilot'] = $data->user_username;
                    } else if (strtolower($data->role_name) == "delegate") {
                        $_SESSION['delegate'] = $data->user_username;
                    }
                    header('Location:landing.php');
                    die;
                } else {
                    header('Location: ../../../index.php?login_err=password');
                }
            } else {
                header('Location: ../../../index.php?login_err=email');
            }
        } else {
            header('Location: ../../../index.php?login_err=already');
        }
    } else {
        header('Location: ../../../index.php');
    }






?>