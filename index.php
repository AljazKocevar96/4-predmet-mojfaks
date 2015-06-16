<?php 
include_once 'header.php' ; 
include_once 'db.php'; 
include_once 'funkcije.php'; 
include_once 'session.php';

?>
<div class="container">
    
<div class="row">
  <div class="col-lg-12-bg block-flat" >
      <div class="row">
          <h3 style="margin-left: 3%; color: ">Kratka predstavitev s čim se ukvarjamo.</h3>
          <hr style="width: 95%;">
    </div>
<center>
      <div class="col-lg-11" style="margin-right: 3%; margin-left: 3%; ">
         <strong> <p>Moj faks je spletna stran namenjena študentom, ki imajo težavo z odločanjem glede njihove študijske poti.
              Tukej imate zbrane vse slovenske fakultete zbrane na enem mestu. O njih se lahko pogovarjate z ostalimi uporabniki
              foruma, lahko pa se testirate s kvizom, ki vam bo pomagal pri odločitvi.</p></strong>
      </div>
    </center>

      <div class="row" style=" padding: 3%;">
      <div class="col-lg-12">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
        <img src="slike/students_2_big.jpg" alt="Slika1">
      <div class="carousel-caption">
        Zadovoljni študentje
      </div>
    </div>
    <div class="item">
        <img src="slike/prenos.jpg" alt="slika2">
      <div class="carousel-caption">
        Študenti
      </div>
    </div>
      
      <div class="item">
          <img src="slike/images.jpg" alt="slika2">
      <div class="carousel-caption">
        Študentka
      </div>
    </div>
   
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
         <div class="clear"></div>
      </div>

  </div>



  </div>
 
</div>
</div>
        

    </body>
</html>

<style>
    .col-lg-12-bg{
        
    background-color: white;
    box-shadow: 1px 1px 2px #bbbbbb;
    margin:0 auto 0 5%; 
    position:relative; 
    width: 90%; 
    border-top-style: solid;
    border-top-color: rgb(34, 194, 34); 
    
    
    
    }
    
    
    
</style>