<?php
include_once 'db.php';
include_once 'session.php';
include_once 'funkcije.php';

$topicID= (int) $_GET['id']; 

$uquery="SELECT * FROM uporabniki";
$uresult= mysqli_query($link, $uquery);
$urow= mysqli_fetch_array($uresult);

$query="SELECT * FROM topic";
$result=  mysqli_query($link, $query); 
$row=  mysqli_fetch_array($result); 


if($_SESSION['user_id']==$row['uporabnik_id'] || $_SESSION['admin']==1){

    if($_SESSION['admin']==1){
        $queryDEL= "DELETE FROM topic WHERE id=".$topicID;
        $result=  mysqli_query($link, $queryDEL);

    }

    else {
        $queryDEL = "DELETE FROM topic WHERE uporabnik_id=" . $_SESSION['user_id'] . " AND id=" . $topicID;
        $result = mysqli_query($link, $queryDEL);
    }

   header('Location: forum.php');
    
}

else{
    
    header('Location: 403.php'); 
}