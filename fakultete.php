<?php 
include_once 'header.php' ; 
include_once 'db.php'; 
include_once 'funkcije.php'; 
include_once 'session.php';

$queryLJ="SELECT * FROM fakultete WHERE kraj='1000 Ljubljana'"; 
$resultLJ=  mysqli_query($link, $queryLJ); 

$queryMB="SELECT * FROM fakultete WHERE kraj=LIKE 2%"; 
$resultMB=  mysqli_query($link, $queryMB); 

$queryKP="SELECT * FROM fakultete WHERE kraj=LIKE 6%"; 
$resultKP=  mysqli_query($link, $queryKP); 

$queryNG="SELECT * FROM fakultete WHERE kraj='5000 Nova Gorica'"; 
$resultNG=  mysqli_query($link, $queryNG); 

$queryCE="SELECT * FROM fakultete WHERE kraj='3000 Celje'"; 
$resultCE=  mysqli_query($link, $queryCE); 

$queryKR="SELECT * FROM fakultete WHERE kraj='4000 Kranj'"; 
$resultKR=  mysqli_query($link, $queryKR); 



?>
<div class="col-lg-12">
  <div class="input-group">
      <input type="text" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
    </div>
</div >
<br/>
<div class="col-lg-12">
<div class="panel panel-primary">
  <!-- Default panel contents -->
  <div class="panel-heading">Ljubljana</div>
  
  <!-- List group -->
  <ul class="list-group">
       <?php while($rowLJ=  mysqli_fetch_array($resultLJ)){ ?>
    <li class="list-group-item"> <h4><?php echo $rowLJ['ime'];  ?></h4></li>
    <?php } ?>
  </ul>
</div>
</div>

   
  
      
         
  

 



        

    </body>
</html>

<style>
    .container{
        
    background-color: white;
    box-shadow: 1px 1px 2px #bbbbbb;
    margin:0 auto 0 5%; 
    position:relative; 
    width: 90%; 
    border-top-style: solid;
    border-top-color: #3e5e9a; 
    
    
    
    }
    
    h3{
        color:#3e5e9a; 
        
    }
    
    #pregledFakultet{
        
        
        margin-top: 2%; 
    }
    
    
    
</style>