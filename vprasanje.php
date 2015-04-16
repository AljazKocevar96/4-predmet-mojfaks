<?php
include_once 'header.php';
include_once 'funkcije.php';
include_once 'db.php';
include_once 'session.php';

$idTopic= (int)$_GET['id']; 

$query="SELECT * FROM topic WHERE id=".$idTopic; 
$result=  mysqli_query($link, $query); 
$row=  mysqli_fetch_array($result);
?>

<div class="col-lg-12 bg">
    <div class="row">
        <div class="col-lg-12">
            <h3 style="margin-left: 2%; color: #febe29;  "><?php echo $row['name'] ; ?></h3>
        </div>
    </div>
    <hr style="width: 96%; ">
    <div class="row">
        <div class="col-lg-12">
            <h4 style="margin-left: 3%;"><strong>Vprašanje </strong><small> - <?php echo $row['add_date']; ?></small></h4>
            <br>
            <p style="margin-left: 7%; "><?php echo $row['question']; ?></p>
        </div>
    </div>
    <hr style="width: 96%; ">
    <div class="row">
        <div class="col-lg-12">
            
</div>
    </div>
</div>

<style>
        .bg{
        border-top-style: solid ;
        border-top-color: #febe29; 
        background-color: white;
        box-shadow: 1px 1px 2px #bbbbbb;
        margin:0 auto 0 5%; 
        position:relative; 
        width: 90%; 
        padding-bottom: 3%; 

    }
    
</style>