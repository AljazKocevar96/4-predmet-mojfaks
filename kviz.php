<?php
include_once 'header.php';
include_once 'db.php';
include_once 'session.php';
include_once 'funkcije.php';

 
?>

<div class="col-lg-12 bg">
  <?php if (empty($_GET['step']) || $_GET['step']==1 ) { ?>
   <!-- HEAD -->
    <div class="progress" style="margin-top: 3%; ">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
  </div>
</div>
    
    <hr>
    <br>
    <!-- HEAD -->
    
    <form action="kviz.php?step=2" method="post">
        <center>
            <h2 style="color: #f1685e;">Pozdravljeni !</h2>
            <br>
            <p>V tem kvizu boste odgovarjali na vprašanja, ki se tičejo vaše študijske poti.</p>
            <p>Predlogi so le na podlagi vaših odgovorov in ne pomenijo, da za druge šole/poklice niste primerni.</p>
            <br><br>
            
            <button type="submit" style="border-radius: inherit; " class="btn btn-success" >Naprej &nbsp;<i class="fa fa-caret-right"></i></button>
        </center>
    </form>
  <?php } ?>
    
    
    
 <?php if($_GET['step']==2){ ?>
       <!-- HEAD -->
         <div class="progress" style="margin-top: 3%; ">
  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
  </div>
</div>
       <h3>Prvo vprašanje: </h3>
    
    <hr>
    <br>
    <div class="col-lg-12">
        <form action="kviz.php?step=3" method="post" >
        <h4>Kako si predstavljate svoje delovno mesto ? </h4>
        <br>
        <input type="radio" name="q1" value="10"/> Všeč mi je delo v pisarni<br><!-- Ekonomist -->
        <input type="radio" name="q1" value="20"/> Všeč mi je delo na terenu<br>
        <input type="radio" name="q1" value="30"/> Všeč mi je delo od doma<br><br><!-- Računalničar -->
        <button type="submit"  style="border-radius: inherit; " class="btn btn-success" >Naprej &nbsp;<i class="fa fa-caret-right"></i></button> 
        </form>
    </div>
    <!-- HEAD -->
 <?php } ?>
   
    <?php if($_GET['step']==3){ 
        
        $_SESSION['q1'] = $_POST['q1']; 
        
        
        ?>
      <!-- HEAD -->
     <div class="progress" style="margin-top: 3%; ">
  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
  </div>
</div>
    <h3>Drugo vprašanje: </h3>
      
    <hr>
    <br>
    
    <div class="col-lg-12">
        <form action="kviz.php?step=4" method="post" >
        <h4>Delo kakšnega tipa vam najbolj pristoji ?</h4>
        <br>
        <input type="radio" name="q2" value="10"/> Všeč mi je delo z ljudmi.<br>
        <input type="radio" name="q2" value="20"/> Rad imam živali in naravo, rad potujem in se vozim.<br>
        <input type="radio" name="q2" value="30"/> Rad delam zase, ker me ljudje pri delu dekoncentrirajo.<br><br>
        <button type="submit"  style="border-radius: inherit; " class="btn btn-success" >Naprej &nbsp;<i class="fa fa-caret-right"></i></button> 
        </form>
    </div>
    
    <?php } ?>
    
    <?php if($_GET['step']==4){ 
        
        $_SESSION['q2']=$_POST['q2'];  ?>
    
    <!-- HEAD -->
    <div class="col-lg-12">
    
        <div class="progress" style="margin-top: 3%; ">
  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
  </div>
</div>
        <h3>Tretje vprašanje: </h3>
        
    <hr>
    <br>
    
    <div class="col-lg-12">
        <form action="kviz.php?step=5" method="post" >
        <h4>Kako prenašate pritisk s strani ljudi ?</h4>
        <br>
        <input type="radio" name="q3" value="10"/> S tem nimam težav. Ludi znam pomiriti in usmerjati situacijo.<br>
        <input type="radio" name="q3" value="20"/> Na to se ne oziram.<br>
        <input type="radio" name="q3" value="30"/> Ne maram pritiska, postanem preveč površen, sam pa sem rad natančen<br><br>
        <button type="submit"  style="border-radius: inherit; " class="btn btn-success" >Naprej &nbsp;<i class="fa fa-caret-right"></i></button> 
        </form>
    </div>
    
      
    <?php } ?>
    
      <?php if($_GET['step']==5){ 
        
        $_SESSION['q3']=$_POST['q3'];  ?>
    
    <!-- HEAD -->
    <div class="col-lg-12">
    
        <div class="progress" style="margin-top: 3%; ">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
  </div>
</div>
       <h3>Četrto vprašanje: </h3>
        
    <hr>
    <br>
    
    <div class="col-lg-12">
        <form action="kviz.php?step=6" method="post" >
        <h4>Če bi sodili zase kakšne vrste človek bi rekli da ste ? </h4>
        <br>
        <input type="radio" name="q4" value="10"/> Zelo razgledan, večstranski, preračunjljiv, dober govornik.<br>
        <input type="radio" name="q4" value="20"/> Družaben, skuliran, rad imam naravo, rad pomagam.<br>
        <input type="radio" name="q4" value="30"/> Zelo logičen, razmišljujoč, ustvarjalen in produktiven.<br><br>
        <button type="submit"  style="border-radius: inherit; " class="btn btn-success" >Naprej &nbsp;<i class="fa fa-caret-right"></i></button> 
        </form>
    </div>
    
      
    <?php } ?>
    
    
      <?php if($_GET['step']==6){ 
        
        $_SESSION['q4']=$_POST['q4'];  ?>
    
    <!-- HEAD -->
    <div class="col-lg-12">
    
        <div class="progress" style="margin-top: 3%; ">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
  </div>
</div>
        
    <hr>
    <br>
    
    
      <?php  
        
        $rezultat=$_SESSION['q1']+$_SESSION['q2']+$_SESSION['q3']+$_SESSION['q4'];  
        
        if($rezultat>=40 && $rezultat <= 60){?>
            
           <center>
               <h3 style="color: #5cb85c; ">Poklic v stiku z ljudmi !</h3>
               <p>Imate veliko kvalitet na področju dela z ljudmi saj jih obvladate.</p>
               <p>Seveda oba veva, da vam tudi pisarna ni tuja in, da se znate tudi tam hitro znajti in opraviti kar vas čaka.</p>
               <p>Ste človek, ki ima rad stvari pod kontrolo in obvlada pritisk. Hitro se znate prilagoditi kot, je v tem poslu tudi potrebno</p>
               <br><br>
               <p>Za maksimalni izkoristek vaših lastnosti vam predlagamo naslednje fakultete:</p>
               
             <?php
             $queryfac="SELECT * FROM fakultete "; 
             $rezultfac=  mysqli_query($link, $queryfac);
             
             while ($rowfac=  mysqli_fetch_array($rezultfac)){ 
                 
                 if($rowfac['id']==6 || $rowfac['id']==29 ||$rowfac['id']==49){
                 ?>
               
               
               
               <a href="fakulteta.php?id=<?php echo $rowfac['id'];?>"><?php echo $rowfac['ime']  ; ?></a>&nbsp;
               
             <?php } }?>
               
            </center>
      <?php  }  ?>
    
    
    
    
        
        <?php if($rezultat>=70 && $rezultat <= 90){?>
             <center>
               <h3 style="color: #5cb85c; ">Terensko delo !</h3>
               <p>Znašli bi se na terenu. Vidi se vam, da vam odgovorja delo zunaj, delo z naravo.</p>
               <p>Pri delu se verjetno radi sprostite, ne menite se za pritiske in svoje delo opravite suvereno.</p>
               <p>Radi pomagate kar vaše delovno mesto zahteva. Mislim, da boste s tem imeli njamajši problem.</p>
               <br><br>
               <p>Za maksimalni izkoristek vaših lastnosti vam predlagamo naslednje fakultete:</p>
               
             <?php
             $queryfac="SELECT * FROM fakultete "; 
             $rezultfac=  mysqli_query($link, $queryfac);
             
             while ($rowfac=  mysqli_fetch_array($rezultfac)){ 
                 
                 if($rowfac['id']==5 || $rowfac['id']==8 ||$rowfac['id']==61){
                 ?>
               
               
               
               <a href="fakulteta.php?id=<?php echo $rowfac['id'];?>"><?php echo $rowfac['ime']  ; ?></a>&nbsp;
               
             <?php } }?>
               
            </center>
           <?php } ?>
        
    
    
    
    
        <?php if($rezultat>=90 && $rezultat <= 120){ ?>
             <center>
               <h3 style="color: #5cb85c; ">Tehnik ! </h3>
               <p>Pri svojem delu se natančni, imate radi mir, da ste lahko skoncentrirani.</p>
               <p>Po karakterju individualist, ki sprejme nove izzive. Nagibate se k inovativnosti in izboljšavam na področju tehnike.</p>
               <p>Delate lahko od doma, iz pisarne, kakor koli že želite. Ne bodite pa pozni z dostavo projektov. Šef ne bo preveč vesel.</p>
               <br><br>
               <p>Za maksimalni izkoristek vaših lastnosti vam predlagamo naslednje fakultete:</p>
               
             <?php
             $queryfac="SELECT * FROM fakultete "; 
             $rezultfac=  mysqli_query($link, $queryfac);
             
             while ($rowfac=  mysqli_fetch_array($rezultfac)){ 
                 
                 if($rowfac['id']==15 || $rowfac['id']==30 ||$rowfac['id']==38){
                 ?>
               <a href="fakulteta.php?id=<?php echo $rowfac['id'];?>"><?php echo $rowfac['ime']  ; ?></a>&nbsp;
             <?php } }?>
            </center>
           <?php } ?>
        
        
    
    
      <?php } ?>
    
    
    
  
</div>


<style>
.bg{
        border-top-style: solid ;
        border-top-color: #f1685e; 
        background-color: white;
        box-shadow: 1px 1px 2px #bbbbbb;
        margin:0 auto 0 5%; 
        position:relative; 
        width: 90%; 
        padding-bottom: 3%; 

    }
    

