<?php
include_once 'db.php';
include_once 'header.php';
include_once 'funkcije.php';
include_once 'session.php';
$queryUser = "SELECT * FROM uporabniki";
$resultUser = mysqli_query($link, $queryUser);
$rowUser = mysqli_fetch_array($resultUser);


$queryFaculty = "SELECT * FROM fakultete fa INNER JOIN favoriteFaculty ff ON fa.id=ff.faculty_id";
$resultFF = mysqli_query($link, $queryFaculty);
$dat_roj=explode("-" ,$rowUser['dat_roj']);
$dat_roj=$dat_roj[2].". ".$dat_roj[1].". ".$dat_roj[0]; 
$dat_pridruzitve=  explode(":", $rowUser['dat_pridruzitve']); 
$letnica=explode(" ",$dat_pridruzitve[2]);
$dat_pridruzitve= $dat_pridruzitve[0].". ".$dat_pridruzitve[1].". ".$letnica[0]; 
?>

<div class="col-lg-12 bg">
    <div class="row">
        <h3 style="color:rgb(34, 194, 34); margin-left: 3%;">Profil</h3>
    </div>
    <hr>


    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-5">

                <span><strong>Urejanje profila</strong></span>
                <hr>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-4">
                            <img src="<?php echo $rowUser['slika']; ?>" alt="slika" name="slika" style="border-radius: 50%; width: 5em; "/>
                        </div>
                        <div class="col-lg-8">
                            <span><strong><?php echo $rowUser['ime'] . " " . $rowUser['priimek']; ?></strong></span><br>
                            <span><strong>E-pošta: </strong><?php echo $rowUser['email']; ?></span><br>
                            <span><strong>Datum rojstva: </strong><?php echo $dat_roj; ?></span><br>
                            <span><strong>Datum pridružitve: </strong><?php echo $dat_pridruzitve; ?></span><br>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="col-lg-1">

            </div>

            <div class="col-lg-6" >
                <span><strong>Priljubljene fakultete</strong></span>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>Fakulteta</td>
                                    <td>Priljubljeno</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="clear"></div>
            </div>
        </div>
    </div>


</div>


<style>
    .col-lg-12{

    }

    .bg{
        border-top-style: solid ;
        border-top-color: rgb(34, 194, 34); 
        background-color: white;
        box-shadow: 1px 1px 2px #bbbbbb;
        margin:0 auto 0 5%; 
        position:relative; 
        width: 90%; 

    }
</style>

