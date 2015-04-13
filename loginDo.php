<?php
include_once 'funkcije.php';
include_once 'db.php';
include_once 'session.php';



if (!empty($_POST['email']) && !empty($_POST['pass'])) {

    $email = clean_post($_POST['email']);
    $pass = clean_post($_POST['pass']);

    $passCrypt = sha1(md5($pass));

    $query = "SELECT * FROM uporabniki WHERE (email=" . "'$email'" . " AND pass=" . "'$passCrypt'" . ")";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_array($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['ime'] = $user['ime'];
        $_SESSION['priimek'] = $user['priimek'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['admin']= $user['admin'];

        
        header("Location:index.php");
        
    }
    else {
        $_SESSION['login_stat'] = "fail";
        header("Location:login.php");
    }
} 
else {
    $_SESSION['login_stat'] = "fail";
    header("Location:login.php");
}
?>