<?php
include_once 'db.php';
include_once 'funkcije.php';

$state=$_POST['state'];
$IdFakultete= $_POST['IDfac']; 
$datum=date("d:m:y H:m:s");

$Query="INSERT INTO favoriteFaculty (user_id, faculty_id, state, date) VALUES ('".$_SESSION['user_id']."','".$IdFakultete."','".$state."','".$datum."') ";
$result=  mysqli_query($link, $Query); 


?>
