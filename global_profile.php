<?php
include_once 'db.php';
include_once 'header.php';
include_once 'funkcije.php';
include_once 'session.php';

$userID= (int) $_GET['id']; 

$queryUser = "SELECT * FROM uporabniki WHERE id=".$userID;
$resultUser = mysqli_query($link, $queryUser);
$rowUser = mysqli_fetch_array($resultUser);


$queryFaculty = "SELECT * FROM fakultete fa INNER JOIN favoritefaculty ff ON fa.id=ff.faculty_id WHERE ff.user_id=".$userID;
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

                <span><strong>Podrobnosti</strong></span>
                <hr>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-4">
                            <img src="<?php echo $rowUser['slika']; ?>" alt="slika" name="slika" style="border-radius: 50%; width: 5em; "/>
                        </div>
                        <div class="col-lg-8">
                            <span><strong><?php echo $rowUser['ime']. " " . $rowUser['priimek']; ?></strong></span><br>
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
                            <thead>
                                <tr>
                                    <th>Ime Fakultete</th>
                                    <th>Mesto</th>
                                    <td><i class="fa fa-star" style="color:#bbbbbb;"></i></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=0;  
                            while($rowFF = mysqli_fetch_array($resultFF)){ 
                                if($rowFF['state']=="favorited"){
                                ?>
                                <tr>
                                    <td><a href="fakulteta.php?id=<?php echo $rowFF['0'];?>"><?php echo $rowFF['ime'];?></a></td>
                                    <td><?php echo $rowFF['kraj'];  ?></td>
                                    <td><i class="fa fa-star" style="color:#febe29;"></i></td>
                                </tr>
                            <?php }
                            }?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="clear"></div>
            </div>
        </div>
    </div>

    <hr>
    <center>
        <button id="showMessageing" class="btn btn-primary" style="width:70em;   border-radius: inherit; "> Napiši mi sporočilo</button>
    </center>
    <br>
   
    <div class="col-lg-12" style="display: none; margin-top: 3%; " id="Messageing">
        <h4 style="color:#2e6da4; ">Napišite sporočilo:</h4>
        <hr>
        <div class="row">
            <input type="text" name="zadeva" id="zadeva" class="form-control" style="width: 40%; " placeholder="Zadeva">
        </div>
        <br>
        <div class="row">
            <textarea id="message" rows="5" class="form-control" placeholder="Vaše sporočilo" style="border-radius: inherit; "></textarea>
        </div>
        <br>
        <div class="row">
             <div id="SuccessAlert" class="alert alert-success position" role="alert" style="display: none; "><strong>Sporočilo uspešno poslano</strong></div>
             <div id="WarningAlert" class="alert alert-warning position" role="alert" style="display: none; "><strong>Ups. Malo več pa le  napišite.</strong></div>
             <button id="send" class="btn btn-success" style="float: right; margin-right: 3%; border-radius: inherit; width: 10em;"><i class="fa fa-envelope" style="margin-right: 5%; "></i>Pošlji sporočilo</button>
        </div>
        <br>
    </div>
</div>
<script>
function Reset(){
     document.getElementById("message").value = "";
    
}
</script>
<script>
$("#showMessageing").click(function(){
    if($("#Messageing").is(":hidden")){
        $("#Messageing").slideDown(); 
    }
    else{
        $("#Messageing").slideUp(); 
    }
});
</script>
<script>
$("#send").click(function(){
   var message= $("#message").val(); 
   var messageLenght = message.length; 
   var zadeva=$("#zadeva").val(); 
   var UserID=<?php echo $userID;?>;
   
   if(messageLenght>2){
       $.ajax({
          url:"send_message.php",
          type: 'POST', 
          data:{sporocilo:message, uid:UserID, zadeva:zadeva},
          success: function() {
                        
                        $("#SuccessAlert").slideDown(); 
                        setTimeout(function(){
                            $("#SuccessAlert").slideUp(); 
                            
                        },1500);
                        
                        setTimeout(function(){
                     $("#Messageing").slideUp();
                     },1700);
                     Reset(); 
                    }
       });
   }
   else{
       $("#WarningAlert").slideDown(); 
       setTimeout(function(){
           $("#WarningAlert").slideUp(); 
       },1500);
       
   }
});
</script>

<style>
    .position{
        float: left; 
        width:80%; 
        
    }

    .bg{
        border-top-style: solid ;
        border-top-color: rgb(34, 194, 34); 
        background-color: white;
        box-shadow: 1px 1px 2px #bbbbbb;
        margin:0 auto 0 5%; 
        position:relative; 
        width: 90%; 
        padding-bottom: 3%; 

    }
</style>

