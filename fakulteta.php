<?php
include_once 'db.php';
include_once 'header.php';


$IdFakultete = (int) $_GET['id'];



$query = "SELECT * FROM fakultete WHERE id=" . $IdFakultete;
$result = mysqli_query($link, $query);

$row = mysqli_fetch_array($result);
?>



<div class="content">
    <div class="col-lg-12" >

        <div class="row">
            <div class="col-lg-10 col-md-9 col-sm-8 col-xs-5">
            <h3 style="margin-left: 3%;"><?php echo $row['ime']; ?></h3>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <button id="favoriteFaculty" type="button" class="btn btn-primary" style="margin-top: 5%;"> <i id="ikona" class="fa fa-star"></i> <span id="tekst">Med priljubljene</span></button>
            </div>
        </div>
        <script>
        $("#favoriteFaculty").click(function(){
            
           alert("Kliknjeno"); 
           var state="favorited";
           var IDF= <?php echo $IdFakultete; ?>
           
           $.ajax({
               url:"favoriteFaculty.php",
               type:"POST",
               data:{state:state , IDfac: IDF},
               success: function () {
                        
                         $("#tekst").text("Priljubljeno"); 
                        
                    }
               
           });
        });
        </script>
        <hr/>
        <br/>
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <h4 style="margin-left: 3%;">Podatki</h4>
                    <hr style="width: 95%; ">
                </div>
                
                <strong><?php Echo $row['ime']." (".$row['kratica'].")"; ?></strong><br/>
                <span>Naslov: <?php Echo $row['naslov'].", ".$row['kraj']; ?></span>
                
            </div>

            <div class="col-lg-1"></div><!-- Break -->

            <div class="col-lg-5">
                <div class="row">
                    <h4 style="margin-left: 3%;">Kontakt in splet</h4>
                    <hr style="width: 95%; ">
                </div>
                
                  <span>Telefon: <?php Echo $row['tel']; ?></span><br/>
                  <span>Spletni naslov: <a target="_blank" href="<?php Echo $row['splet']; ?>"><?php Echo $row['splet']; ?></a></span>
                
                
            </div>
        </div>
    </div>

    <style>
        .col-lg-12{

            margin:0 auto 0 5%; 
            position:relative; 
            width: 90%; 

        }


        .col-lg-1{
            width:1em; 
        }

        .col-lg-12{
            background-color: white;
            box-shadow: 1px 1px 2px #bbbbbb;
            border-top-style: solid;
            border-top-color: #3e5e9a;
            margin:0 auto 0 5%; 
            position:relative; 
            width: 90%; 
            padding-bottom: 5%; 

        }


    </style>

