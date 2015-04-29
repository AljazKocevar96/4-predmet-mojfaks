<?php
include_once 'db.php';
include_once 'funkcije.php';
include_once 'session.php';

$sporocilo = clean_post($_POST['sporocilo']);
$zadeva=  clean_post($_POST['zadeva']); 
$prejemnikID= $_POST['uid']; 
$date=  date("d.m.Y H.m.s"); 

if(!empty($sporocilo)&& !empty($zadeva)){
    
    $query="INSERT INTO sporocanje (posiljatelj_id, prejemnik_id, zadeva, sporocilo, status, datum)"
            ." VALUES ('".$_SESSION['user_id']."','".$prejemnikID."','".$zadeva."','".$sporocilo."','unRead','".$date."')";
    
    $result=  mysqli_query($link, $query); 
    
}

