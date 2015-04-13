<?php
include_once 'header.php';
include_once 'db.php';
include_once 'funkcije.php';
include_once 'session.php';

$queryLJ = "SELECT * FROM fakultete WHERE kraj='1000 Ljubljana'";
$resultLJ = mysqli_query($link, $queryLJ);

$queryMB = "SELECT * FROM fakultete WHERE kraj LIKE '2%'";
$resultMB = mysqli_query($link, $queryMB);

$queryKP = "SELECT * FROM fakultete WHERE kraj LIKE '6%'";
$resultKP = mysqli_query($link, $queryKP);

$queryNG = "SELECT * FROM fakultete WHERE kraj='5000 Nova Gorica'";
$resultNG = mysqli_query($link, $queryNG);

$queryCE = "SELECT * FROM fakultete WHERE kraj='3000 Celje'";
$resultCE = mysqli_query($link, $queryCE);

$queryKR = "SELECT * FROM fakultete WHERE kraj='4000 Kranj'";
$resultKR = mysqli_query($link, $queryKR);
?>

<script>
    function RezIskanja(value) { // value dobi direktno iz inputa kjer je zvezano na to funkcijo RezIskanja preko html atributa onkeyup

        $.ajax({
            url: "search.php",
            type: "POST",
            data: {iskano: value},
            success: function (data) {
                //kar se pošlje nazaj iz strani search.php se prejme v success funkciji v spremenjivko data
                //vsi rezultati, ki jih dobi nazaj se pretvorijo v html in zapišejo v div z ID zadetki.
                $("#zadetek").html(data);
            }
        });
    }
</script>

<div class="col-lg-12 zadnji">
    <div class="row">
        <h3 style="margin-left: 3%;">Fakultete</h3>

    </div>
    <hr>

    <div class="col-lg-5">
        <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-search"></i></span><!-- aria-describbedby="sizing-addon2" se navezuje na stil ID TEGA SPANA, KI POVE KOLIKO VELIKA BO IKONICA V DADATKU -->
            <input type="text" class="form-control" placeholder="Iskalni niz..." id="iskalnik" onkeyup="RezIskanja(this.value)" aria-describedby="sizing-addon2">
        </div>
    </div >

    <br/>
    <br/>
    <br/>

    <style>
        #star{
            color: #ccc; 
            
        }
    </style>
    
    <div class="col-lg-12" id="LJ">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">Ljubljana</div>

            <!-- List group -->
            <ul class="list-group">
                <?php while ($rowLJ = mysqli_fetch_array($resultLJ)) { ?>
                    <a href="fakulteta.php?id=<?php echo $rowLJ['id']; ?>">
                        <li class="list-group-item"> 
                            <div class="row">
                                <div class="col-lg-11 col-md-11 col-xs-10 col-sm-11">
                            <h4><?php echo $rowLJ['ime']; ?></h4>
                                </div>
                                
                               
                            </div>
                                
                                
                        </li>
                    </a>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="col-lg-12" id="MB">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">Maribor</div>

            <!-- List group -->
            <ul class="list-group">
                <?php while ($rowMB = mysqli_fetch_array($resultMB)) { ?>
                    <a href="fakulteta.php?id=<?php echo $rowMB['id']; ?>">
                        <li class="list-group-item"> 
                            <div class="row">
                                <div class="col-lg-11 col-md-11 col-xs-10 col-sm-11">
                            <h4><?php echo $rowMB['ime']; ?></h4>
                                </div>
                                 
                               
                            </div>
                                
                        </li>
                    </a>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="col-lg-12" id="KP">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">Koper</div>

            <!-- List group -->
            <ul class="list-group">
                <?php while ($rowKP = mysqli_fetch_array($resultKP)) { ?>
                    <a href="fakulteta.php?id=<?php echo $rowKP['id']; ?>">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-11 col-md-11 col-xs-10 col-sm-11">
                            <h4><?php echo $rowKP['ime']; ?></h4>
                                </div>
                                
                               
                            </div>
                                
                        </li>
                    </a>
                <?php } ?>
            </ul>
        </div>
    </div>



    <div class="col-lg-12" id="NG">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">Nova Gorica</div>

            <!-- List group -->
            <ul class="list-group">
                <?php while ($rowNG = mysqli_fetch_array($resultNG)) { ?>
                    <a href="fakulteta.php?id=<?php echo $rowNG['id']; ?>">
                        <li class="list-group-item"> 
                            <div class="row">
                                <div class="col-lg-11 col-md-11 col-xs-10 col-sm-11">
                            <h4><?php echo $rowNG['ime']; ?></h4>
                             </div>
                            
                               
                            </div>
                        </li>
                    </a>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="col-lg-12" id="CE">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">Celje</div>

            <!-- List group -->
            <ul class="list-group">
                <?php while ($rowCE = mysqli_fetch_array($resultCE)) { ?>
                    <a href="fakulteta.php?id=<?php echo $rowCE['id']; ?>">
                        <li class="list-group-item"> 
                            <div class="row">
                                <div class="col-lg-11 col-md-11 col-xs-10 col-sm-11">
                            <h4><?php echo $rowCE['ime']; ?></h4>
                            </div>
                           
                                
                            </div>
                        </li>
                    </a>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="col-lg-12" id="KR">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">Kranj</div>

            <!-- List group -->
            <ul class="list-group">
                <?php while ($rowKR = mysqli_fetch_array($resultKR)) { ?>
                    <a href="fakulteta.php?id=<?php echo $rowKR['id']; ?>">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-11 col-md-11 col-xs-10 col-sm-11">
                            <h4><?php echo $rowKR['ime']; ?></h4>
                                </div>
                              
                            </div>
                        </li>
                    
                    </a>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="col-lg-12" id="search" style="display: none; ">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">Rezultati iskanja za: <strong id="NaslovIskanja"></strong></div>

            <!-- List group -->
            <ul class="list-group" id="zadetek">



            </ul>
        </div>
    </div>
</div>

<script>
    $("#iskalnik").on('input', function () {



        if ($("#iskalnik").val() !== "") {

            $("#LJ").hide();
            $("#MB").hide();
            $("#CE").hide();
            $("#KP").hide();
            $("#KR").hide();
            $("#NG").hide();
            $("#search").show();
        }

        else {
            $("#LJ").show();
            $("#MB").show();
            $("#CE").show();
            $("#KP").show();
            $("#KR").show();
            $("#NG").show();
            $("#search").hide();
        }

        $("#NaslovIskanja").text($("#iskalnik").val()); //vrednost iz iskalnega polja se postavi v tekstovno obliko in zapiše na mesto v znački diva z ID NaslovIskanja

    });
</script>

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

    .col-lg-12.zadnji{
        background-color: white;
        box-shadow: 1px 1px 2px #bbbbbb;
        margin:0 auto 0 5%; 
        position:relative; 
        width: 90%; 
        border-top-style: solid;
        border-top-color: #3e5e9a; 
    }
</style>