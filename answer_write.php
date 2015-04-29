<?php

include_once 'db.php';
include_once 'session.php';
include_once 'funkcije.php';

$answer=clean_post( $_POST['odgovor']);
$tid=  $_POST['TopicId']; 
$date=  date("d.m.Y H:m:s");
$answer_to=$_POST['quote']; 
$author=$_POST['author']; 

if(!empty($answer)){
    
    $query="INSERT INTO thread_answers (uporabnik_id, topic_id, answer_to, author, answer, date)"
            . "VALUES ('".$_SESSION['user_id']."','".$tid."','".$answer_to."','".$author."','".$answer."','".$date."')";
    $result=  mysqli_query($link, $query); 
    
    
    
}



