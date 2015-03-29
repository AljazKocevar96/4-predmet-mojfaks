<?php

include_once 'session.php';
include_once 'db.php';
include_once 'funkcije.php';

unset($_SESSION['register_stat']);

$cas = date("d:m:Y H:i:s");

$mail = clean_post($_POST['email']); 
$ime = clean_post($_POST['ime']);
$priimek = clean_post($_POST['priimek']);
$dat_roj = clean_post($_POST['dat_roj']);
$pass1 = clean_post($_POST['pass']);
$pass2 = clean_post($_POST['pass2']);



if (!empty($pass1) && !empty($pass2) && ($pass1 == $pass2) && !empty($mail) &&
        !empty($ime) && !empty($priimek) && !empty($dat_roj)) {

    $query2 = "SELECT * FROM uporabniki WHERE email='" . $mail . "'";
    $result2 = mysqli_query($link, $query2);

    if (mysqli_num_rows($result2) >= 1 ) {

        $_SESSION['register_stat'] = "fail";
        header("Location: register.php");
       
        
    } 
    
    else {
        $_SESSION['register_stat'] = "success";
        $criptPass = sha1(md5($pass1));
        $query = "INSERT INTO uporabniki (email,ime,priimek,pass,dat_roj,dat_pridruzitve) VALUES ('" . $mail . "','" . $ime . "','" . $priimek . "','" . $criptPass . "','" . $dat_roj . "','" . $cas . "')";

        if (!mysqli_query($link, $query)) {

            echo "Napaka!";
        }
        
        else {

            header('Location:login.php');
        }
    }
} 

else {
    $_SESSION['register_stat'] = "passFail";
    header('Location:register.php');
    die();
}
?>

