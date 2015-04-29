<?php
include_once 'header.php';
include_once 'db.php'; 
include_once 'session.php';

$query="SELECT * FROM sporocanje s INNER JOIN uporabniki u ON u.id=s.posiljatelj_id WHERE prejemnik_id=".$_SESSION['user_id']." ORDER BY s.id DESC";
$result=  mysqli_query($link, $query); 
?>

<div class="col-lg-12 bg">
    <h3 style="color: #777;">Sporočanje</h3>
    <hr>
    <div class="tabbable"> <!-- Only required for left/right tabs -->
        <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">Prejeto</a></li>
        <li><a href="#tab2" data-toggle="tab">Poslano</a></li>
        </ul>
        <div class="tab-content">
        <div class="tab-pane active" id="tab1">
             <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Zadeva</th>
                                    <th>Pošiljatelj</th>
                                    <th>Datum</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php  
                             
                            while($row = mysqli_fetch_array($result)){ 
                                if($row['status']=="unRead"){
                                ?>
                                <tr>
                                    <td><a href="prejeto_sporocilo.php?id=<?php echo $row['0'];?>"><strong><?php echo $row['zadeva'];  ?></strong></a></td>
                                    <td><a href="global_profile.php?id=<?php echo $row['id'];?>"><strong><?php echo $row['ime']." ".$row['priimek'];?></strong></a></td>
                                    <td><?php echo $row['datum'];   ?></td>
                                    
                                </tr>
                            <?php }
                            
                            else{ ?>
                                <tr>
                                    <td><a href="prejeto_sporocilo.php?id=<?php echo $row['0'];?>"><?php echo $row['zadeva'];  ?></a></td>
                                    <td><a href="global_profile.php?id=<?php echo $row['id'];?>"><?php echo $row['ime']." ".$row['priimek'];?></a></td>
                                    <td><?php echo $row['datum'];?></td>
                                    
                                </tr>
                                
                            <?php }
                            } ?>
                            </tbody>
                        </table>
        </div>
          
            <?php 
            $query2="SELECT * FROM sporocanje s INNER JOIN uporabniki u ON u.id=s.prejemnik_id WHERE posiljatelj_id=".$_SESSION['user_id']." ORDER BY s.id DESC";
             $result2=  mysqli_query($link, $query2); 
            ?>
            
        <div class="tab-pane" id="tab2">
        	 <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Zadeva</th>
                                    <th>Prejemnik</th>
                                    <th>Datum</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=0;  
                            while($row2 = mysqli_fetch_array($result2)){?>
                                <tr>
                                    <td><a href="poslano_sporocilo.php?id=<?php echo $row2['0'];?>"><?php echo $row2['zadeva'];  ?></a></td>
                                    <td><a href="global_profile.php?id=<?php echo $row['id'];?>"><?php echo $row2['ime']." ".$row2['priimek'];?></a></td>
                                    <td><?php echo $row2['datum'];   ?></td>
                                    
                                </tr>
                             
                            
                            
                              
                            <?php }
                             ?>
                            </tbody>
                        </table>
                
        </div>
        </div>
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
        padding-bottom: 2%; 

    }
    
    a{
        color: black;
    }
    </style>