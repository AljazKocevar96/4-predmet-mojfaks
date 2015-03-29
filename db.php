<?php
$db_name='mojfaks'; 
$server='localhost'; 
$username='root';
$password=''; 

$link=  mysqli_connect($server, $username, $password, $db_name); 
mysqli_query($link, "SET NAMES 'utf8'");

if(!$link){
    
    die("Napaka pri povezavi !". mysqli_error($link));
}
?>
