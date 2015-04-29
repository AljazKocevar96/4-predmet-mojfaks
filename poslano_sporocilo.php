<?php
include_once 'db.php';
include_once 'session.php';
include_once 'header.php';

$msgID= (int) $_GET['id']; 

$query="SELECT * FROM sporocanje s INNER JOIN uporabniki u ON u.id = s.prejemnik_id WHERE s.id=".$msgID; 
$result=  mysqli_query($link, $query); 
$row=  mysqli_fetch_array($result); 
 
?>

<div class="col-lg-12 bg">
    <h3 style="color: #777; margin-left: 2%; "><?php echo $row['zadeva']; ?></h3>
    <hr>
    <div class="row">
        <div class="col-lg-12" style="margin-left: 3%; ">
            <strong>Pošiljatelj: <?php echo $_SESSION['ime']." ".$_SESSION['priimek'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-reply-all"></i><strong><a href="global_profile.php?id=<?php echo $row['id'];  ?>">Odgovori</a></strong> <br><br>Prejemnik: <?php echo $row['ime']." ".$row['priimek'];?> </strong>
            
        </div>
        </div>
        <hr>
        
        <div class="col-lg-12" style="margin-left: 3%; ">
            <h4 style="color: #777;">Sporocilo</h4>
            <br>
            <p>
                <?php echo $row['sporocilo'];  ?>
            </p>
        </div>
    
   
    
</div>
<style>
 .bg{
        border-top-style: solid ;
        border-top-color: #777; 
        background-color: white;
        box-shadow: 1px 1px 2px #bbbbbb;
        margin:0 auto 0 5%; 
        position:relative; 
        width: 90%; 
        padding-bottom: 3%; 

    }
     a{
        color: black;
    }
    </style>