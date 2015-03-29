<?php
include_once 'header.php';
include_once 'db.php';
include_once 'funkcije.php';
include_once 'session.php';


?>

<style>
    .col-lg-12{
        border-top-style: solid ;
        border-top-color: #febe29; 
        background-color: white;
        box-shadow: 1px 1px 2px #bbbbbb;
        margin:0 auto 0 5%; 
        position:relative; 
        width: 90%; 



    }

    h3{

        margin-left: 3%;  
        color: #febe29; 
    }

    a.my-tool-tip, a.my-tool-tip:hover, a.my-tool-tip:visited {

        color: black;
    }


    #myColaps:hover{
        cursor: pointer;

    }

    #content{

        padding-bottom: 2%; 
    }




</style>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>



<div id="content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <h3>Forum</h3>

    </div>
    <hr>


    <!-- Sample for Forum topic -->

    <!-- <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" >
         <div class="panel panel-default">
             <div class="panel-heading" role="tab" id="headingOne"  >
                 <div class="row">
                     <div id="myColaps" class="col-lg-11 col-md-9 col-sm-10 col-xs-7" href="#collapseOne" data-toggle="collapse">
                         <h4 class="panel-title">
                             <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Tema1</a>
                         </h4>
                     </div>
                     <div class="col-lg-1 col-md-3 col-sm-2 col-xs-5">
                         <center> <div class="icons" style="margin-left:15%; ">
                                 
                                 <a data-toggle="tooltip" title="Uredi" href="index.php">
                                     <i id="edit" class="fa fa-pencil" style="color:#428bca; z-index: 1000; "> </i></a>
                                     
                                 <a data-toggle="tooltip" title="Onemogoči">
                                     <i class="fa fa-ban" style="margin-left: 7%; font-size:1.1em; color:#d9534f;"> </i></a>
                                     
                                     <a data-toggle="tooltip" title="Izbriši">
                                         <i class="fa fa-trash" style="margin-left: 7%; font-size: 1.1em; color:#888888; "></i></a>
                             </div></center>
                     </div>
                 </div>
             </div>
             <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                 <div class="panel-body">
                     Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                 </div>
             </div>
         </div>-->

    <?php
    $query = "SELECT * FROM uporabniki WHERE id=" . $_SESSION['user_id'] . ";";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);





    if ($row['admin'] == 1) {
        ?>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <div class="row">
                        <div id="myColaps" class="col-lg-10 col-md-8 col-sm-10 col-xs-7" href="#collapseOne" data-toggle="collapse">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Vpis
                                </a>
                            </h4>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-2 col-xs-5">
                            <center> <div class="icons" style="margin-left:15%; ">

                                    <a data-toggle="tooltip" title="Uredi" href="index.php">
                                        <i id="edit" class="fa fa-pencil" style="color:#428bca; z-index: 1000; "> </i></a>

                                    <a data-toggle="tooltip" title="Onemogoči">
                                        <i class="fa fa-ban" style="margin-left: 7%; font-size:1.1em; color:#d9534f;"> </i></a>

                                    <a data-toggle="tooltip" title="Izbriši">
                                        <i class="fa fa-trash" style="margin-left: 7%; font-size: 1.1em; color:#888888; "></i></a>
                                </div></center>
                        </div>
                    </div>
                </div>
                <?php
                $queryTopicVpis = "SELECT * FROM topic WHERE tema_id= 1";
                $resultTopicVpis = mysqli_query($link, $queryTopicVpis);
                ?>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="list-group">
                        <?php while ($rowTopicVpis = mysqli_fetch_array($resultTopicVpis)) { ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-10 col-md-9 col-sm-10 col-xs-7"><?php echo $rowTopicVpis['name']; ?></div>
                                    <div class="col-lg-2 col-md-3 col-sm-2 col-xs-5">
                                        <center> <div class="icons" style="margin-left:15%; ">

                                                <a data-toggle="tooltip" title="Uredi" href="index.php">
                                                    <i id="edit" class="fa fa-pencil" style="color:#428bca; z-index: 1000; "> </i></a>

                                                <a data-toggle="tooltip" title="Onemogoči">
                                                    <i class="fa fa-ban" style="margin-left: 7%; font-size:1.1em; color:#d9534f;"> </i></a>

                                                <a data-toggle="tooltip" title="Izbriši">
                                                    <i class="fa fa-trash" style="margin-left: 7%; font-size: 1.1em; color:#888888; "></i></a>
                                            </div></center>
                                    </div>

                                </div>
                            </li>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <div class="row">
                        <div id="myColaps" class="col-lg-10 col-md-8 col-sm-10 col-xs-7" href="#collapseTwo" data-toggle="collapse">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Mnenja o fakultetah
                                </a>
                            </h4>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-2 col-xs-5">
                            <center> <div class="icons" style="margin-left:15%; ">

                                    <a data-toggle="tooltip" title="Uredi" href="index.php">
                                        <i id="edit" class="fa fa-pencil" style="color:#428bca; z-index: 1000; "> </i></a>

                                    <a data-toggle="tooltip" title="Onemogoči">
                                        <i class="fa fa-ban" style="margin-left: 7%; font-size:1.1em; color:#d9534f;"> </i></a>

                                    <a data-toggle="tooltip" title="Izbriši">
                                        <i class="fa fa-trash" style="margin-left: 7%; font-size: 1.1em; color:#888888; "></i></a>
                                </div></center>
                        </div>
                    </div>
                </div>
                <?php
                $queryTopicMnenja = "SELECT * FROM topic WHERE tema_id= 2";
                $resultTopicMnenja = mysqli_query($link, $queryTopicMnenja);
                ?>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="list-group">
                        <?php while ($rowTopicMnenja = mysqli_fetch_array($resultTopicMnenja)) { ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-10 col-md-9 col-sm-10 col-xs-7"><?php echo $rowTopicMnenja['name']; ?></div>
                                    <div class="col-lg-2 col-md-3 col-sm-2 col-xs-5">
                                        <center> <div class="icons" style="margin-left:15%; ">

                                                <a data-toggle="tooltip" title="Uredi" href="index.php">
                                                    <i id="edit" class="fa fa-pencil" style="color:#428bca; z-index: 1000; "> </i></a>

                                                <a data-toggle="tooltip" title="Onemogoči">
                                                    <i class="fa fa-ban" style="margin-left: 7%; font-size:1.1em; color:#d9534f;"> </i></a>

                                                <a data-toggle="tooltip" title="Izbriši">
                                                    <i class="fa fa-trash" style="margin-left: 7%; font-size: 1.1em; color:#888888; "></i></a>
                                            </div></center>
                                    </div>

                                </div>
                            </li>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                    <div class="row">
                        <div id="myColaps" class="col-lg-10 col-md-8 col-sm-10 col-xs-7" href="#collapseThree" data-toggle="collapse">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Novičke
                                </a>
                            </h4>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-2 col-xs-5">
                            <center> <div class="icons" style="margin-left:15%; ">

                                    <a data-toggle="tooltip" title="Uredi" href="index.php">
                                        <i id="edit" class="fa fa-pencil" style="color:#428bca; z-index: 1000; "> </i></a>

                                    <a data-toggle="tooltip" title="Onemogoči">
                                        <i class="fa fa-ban" style="margin-left: 7%; font-size:1.1em; color:#d9534f;"> </i></a>

                                    <a data-toggle="tooltip" title="Izbriši">
                                        <i class="fa fa-trash" style="margin-left: 7%; font-size: 1.1em; color:#888888; "></i></a>
                                </div></center>
                        </div>
                    </div>
                </div>
                <?php
                $queryTopicNovicke = "SELECT * FROM topic WHERE tema_id= 3";
                $resultTopicNovicke = mysqli_query($link, $queryTopicNovicke);
                ?>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="list-group">
                        <?php while ($rowTopicNovicke = mysqli_fetch_array($resultTopicNovicke)) { ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-10 col-md-9 col-sm-10 col-xs-7"><?php echo $rowTopicNovicke['name']; ?></div>
                                    <div class="col-lg-2 col-md-3 col-sm-2 col-xs-5">
                                        <center> <div class="icons" style="margin-left:15%; ">

                                                <a data-toggle="tooltip" title="Uredi" href="index.php">
                                                    <i id="edit" class="fa fa-pencil" style="color:#428bca; z-index: 1000; "> </i></a>

                                                <a data-toggle="tooltip" title="Onemogoči">
                                                    <i class="fa fa-ban" style="margin-left: 7%; font-size:1.1em; color:#d9534f;"> </i></a>

                                                <a data-toggle="tooltip" title="Izbriši">
                                                    <i class="fa fa-trash" style="margin-left: 7%; font-size: 1.1em; color:#888888; "></i></a>
                                            </div></center>
                                    </div>

                                </div>
                            </li>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <div class="row">
                        <div id="myColaps" class="col-lg-10 col-md-8 col-sm-10 col-xs-7" href="#collapseOne" data-toggle="collapse">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Vpis
                                </a>
                            </h4>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-2 col-xs-5">
                            <center> <div class="icons" style="margin-left:15%; ">

                                    <a data-toggle="tooltip" title="Uredi" href="index.php">
                                        <i id="edit" class="fa fa-pencil" style="color:#428bca; z-index: 1000; "></i></a>

                                </div></center>
                        </div>
                    </div>
                </div>
                <?php
                $queryTopicVpis = "SELECT * FROM topic WHERE tema_id= 1";
                $resultTopicVpis = mysqli_query($link, $queryTopicVpis);
                ?>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="list-group">
                        <?php while ($rowTopicVpis = mysqli_fetch_array($resultTopicVpis)) { ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-9"><?php echo $rowTopicVpis['name']; ?></div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-3">
                                        <center> <div class="icons" style="margin-left:15%; ">


                                                <a data-toggle="tooltip" title="Priljubljeno" href="index.php">
                                                    <i id="favorite" class="fa fa-star" > </i></a>


                                            </div></center>
                                    </div>

                                </div>
                            </li>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <div class="row">
                        <div id="myColaps" class="col-lg-10 col-md-8 col-sm-10 col-xs-7" href="#collapseTwo" data-toggle="collapse">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Mnenja o fakultetah
                                </a>
                            </h4>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-2 col-xs-5">
                            <center> <div class="icons" style="margin-left:15%; ">

                                    <a data-toggle="tooltip" title="Uredi" href="index.php">
                                        <i id="edit" class="fa fa-pencil" style="color:#428bca; z-index: 1000; "> </i></a>


                                </div></center>
                        </div>
                    </div>
                </div>
                <?php
                $queryTopicMnenja = "SELECT * FROM topic WHERE tema_id= 2";
                $resultTopicMnenja = mysqli_query($link, $queryTopicMnenja);
                ?>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="list-group">
                        <?php while ($rowTopicMnenja = mysqli_fetch_array($resultTopicMnenja)) { ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-11 col-md-1 col-sm-11 col-xs-9"><?php echo $rowTopicMnenja['name']; ?></div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-3">
                                        <center> <div class="icons" style="margin-left:15%; ">


                                                <a data-toggle="tooltip" title="Priljubljeno" href="index.php">
                                                    <i id="favorite" class="fa fa-star" > </i></a>


                                            </div></center>
                                    </div>

                                </div>
                            </li>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                    <div class="row">
                        <div id="myColaps" class="col-lg-10 col-md-8 col-sm-10 col-xs-7" href="#collapseThree" data-toggle="collapse">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Novičke
                                </a>
                            </h4>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-2 col-xs-5">
                            <center> <div class="icons" style="margin-left:15%; ">

                                    <a data-toggle="tooltip" title="Uredi" href="index.php">
                                        <i id="edit" class="fa fa-pencil" style="color:#428bca; z-index: 1000; "> </i></a>


                                </div></center>
                        </div>
                    </div>
                </div>

                <?php
                $queryTopicNovicke = "SELECT * FROM topic WHERE tema_id= 3";
                $resultTopicNovicke = mysqli_query($link, $queryTopicNovicke);
                ?>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="list-group">
                        <?php while ($rowTopicNovicke = mysqli_fetch_array($resultTopicNovicke)) { ?>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-9"><?php echo $rowTopicNovicke['name']; ?></div>
                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-3">
                                        <center> <div class="icons" style="margin-left:15%; ">

                                                <a data-toggle="tooltip" title="Priljubljeno" href="index.php">
                                                    <i id="favorite" class="fa fa-star" > </i></a>


                                            </div></center>
                                    </div>

                                </div>
                            </li>
                        <?php } ?>    
                    </div>
                </div>
            </div>
        </div>
    <?php } ?> 
    <style>
        #favorite:hover {
            color:#febe29;


        }

        #favorite{

            color: #bbbbbb; 
        }

        .fa-star:hover{

            color:#febe29; 

        }
    </style>
    <hr/>
    <button type="button" class="btn btn-warning" style="float:right;" data-toggle="modal" data-target="#topicModal"><i class="fa fa-plus"></i> Dodaj temo</button>


    <!-- Modal -->
    <div class="modal fade" id="topicModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
          
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="myModalLabel">Dodajanje nove teme</h4>
                </div>
                <form action="topicWrite.php" method="POST">
                <div class="modal-body">
                  
                        <div class="input-group input-group">
                            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-question"></i></span>
                            <input required="required" id="imeTeme" type="text" name="ime" class="form-control" placeholder="Ime teme" aria-describedby="sizing-addon1">
                        </div>
                        <br/>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-xs-4 col-sm-2">
                                    <label class="control-label"><h4>Kategorija: </h4></label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-8">
                                    <select required="required" id="teme" class="form-control"  name='kateg' >
                                        <option></option>
                                        <?php
                                        $query4 = "SELECT * FROM teme ;";
                                        $result4 = mysqli_query($link, $query4);

                                        while ($row4 = mysqli_fetch_array($result4)) {
                                            ?>

                                            <option  value="<?php echo $row4['id']; ?>"> <?php echo $row4['ime']; ?></option>

                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                             <label class="control-label"><h4>Vprašanje: </h4></label>
                             <textarea id="question" required="required" class="form-control" placeholder="Vaše vprašanje" style="resize: vertical;" name="vpra"></textarea>
                             
                             
                        </div>
                    



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Prekliči </button>
                    <input type="submit" id="submitTopic" class="btn btn-warning" value="Dodaj">
                </div>
</form>
            </div>
        </div>
    </div>
    
    <center>
            <div id="SuccessAlert" class="alert alert-success" role="alert" style="width:30%; display:none; "><center><strong><i class="fa fa-check"></i> Tema uspešno dodana !</strong></center></div>
            <div id="WarningAlert" class="alert alert-warning" role="alert" style="width:30%; display:none;"><center><strong><i class="fa fa-exclamation-triangle"></i> Nekaterih polj niste izpolnili !</strong></center></div>
            <div id="FailWarning" class="alert alert-danger" role="alert" style="width:30%; display:none;"><center><strong><i class="fa fa-times"></i> Ups. Prišlo je do napake !</strong></center></div>
    </center>
          
    
    <script>
   $(document).ready(function(){
         
                      var postState = "<?php echo $_SESSION['topicInsert']; ?>";
                       '<?php unset($_SESSION['topicInsert']); ?>';
                       
                       
                       
                    if(postState === "success"){
                        
                        $('#SuccessAlert').show(); 
                        
                        setTimeout(function(){
                            
                            $('#SuccessAlert').fadeOut(1500); 
                        },2000);
                    }
                    
                    if(postState === "empty"){
                        
                        $('#WarningAlert').show(); 
                        
                        setTimeout(function(){
                            
                            $('#WarningAlert').fadeOut(1500); 
                        },2000);
                    }
                    
                     if(postState === "fail"){
                        
                        $('#FailAlert').show(); 
                        
                        setTimeout(function(){
                            
                            $('#FailAlert').fadeOut(1500); 
                        },2000);
                    }
       
   });
   
    </script>
</div>


