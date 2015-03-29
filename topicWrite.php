<?php

include_once 'db.php';
include_once 'session.php';
include_once 'funkcije.php';

unset($_SESSION['topicInsert']);

$ime = clean_post($_POST['ime']);
$kategorija = clean_post($_POST['kateg']);
$vprasanje = clean_post($_POST['vpra']);

$_SESSION['date_time'] = date('d.m.Y');

if (!empty($ime) && !empty($kategorija) && !empty($vprasanje)) {

    $query = "INSERT INTO topic (uporabnik_id, name, question, add_date, tema_id) "
            . "VALUES ('" . $_SESSION['user_id'] . "','" . $ime . "','" . $vprasanje . "','" . $_SESSION['date_time'] . "','" . $kategorija . "')";

    $result = mysqli_query($link, $query);
    header("Location:forum.php");
    $_SESSION['topicInsert'] = "success";
} 
else {

    $_SESSION['topicInsert'] = "empty";
    header("Location:forum.php");
}


if (mysqli_connect_error()== true) {
    $_SESSION['topicInsert'] = "fail";
    
}
else {
    $_SESSION['topicInsert'] = "success";
    header("Location:forum.php");
}
?>
