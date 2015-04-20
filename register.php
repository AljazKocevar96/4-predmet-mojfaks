    <?php
    include_once 'header.php';
    ?>

    <style>
        .fullscreen_bg {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-size: cover;
            background-position: 50% 50%;
            background-image: url(http://hsiuncovered.files.wordpress.com/2013/05/wallpaper-1509792.jpg);
            background-repeat:repeat;
            z-index: -1;
        }
    </style>
    <script>
    $(document).ready(function(){
        
        var RegStat = '<?php echo $_SESSION['register_stat']; ?>';
         '<?php unset($_SESSION['register_stat']); ?>';
        
        if(RegStat === "fail"){
            
            $("#RegWarning").show(); 
            
            setTimeout(function(){
               
               $("#RegWarning").fadeOut(1500); 
                
            },2000);
            
        }
        
        if(RegStat === "passFail"){
            
            $("#PassWarning").show(); 
            
            setTimeout(function(){
               
               $("#PassWarning").fadeOut(1500); 
                
            },2000); 
        }    
    });
    </script>
    
    <div id="RegWarning" class="alert alert-danger" role="alert" style="margin-top:7%; margin-left: 36%; width:28%; display: none;"><center><strong>Napaka!</strong> Račun s tem e-naslovom e obstaja. </center></div>
     <div id="PassWarning" class="alert alert-danger" role="alert" style="margin-top:7%; margin-left: 36%; width:28%; display: none;"><center><strong>Napaka!</strong> Gesla se morata ujemati. </center></div>
     
    <div id="fullscreen_bg" class="fullscreen_bg">

        <div class="container" style="margin: 14.3% auto 0 auto; position: relative; ">
            <div class="row vertical-offset-100">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                            <h3 class="panel-title">Registrirajte se</h3>
                        </div>
                        <div class="panel-body">
                            
                            <form method="post" action="DoRegister.php" role="form" style="z-index:1000; ">
                                <fieldset>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon1" ><i class="fa fa-envelope"></i></span>
                                        <input class="form-control" placeholder="E-mail" name="email" type="text"/>
                                    </div>
                                    <div class="input-group" style="margin-top:3%; ">
                                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></span>
                                        <input class="form-control" placeholder="Ime" name="ime" type="text" />
                                    </div>
                                    <div class="input-group" style="margin-top:3%; ">
                                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></span>
                                        <input class="form-control" placeholder="Priimek" name="priimek" type="text" />
                                    </div>
                                    <div class="input-group" style="margin-top:3%; ">
                                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-lock"></i></span>
                                        <input class="form-control" placeholder="Geslo" name="pass" type="password" />
                                    </div>
                                    <div class="input-group" style="margin-top:3%; ">
                                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-lock"></i></span>
                                        <input class="form-control" placeholder="Potrdite geslo" name="pass2" type="password" />
                                    </div>
                                    <div class="form-group" style="margin-top:3%; ">
                                        <input class="form-control" placeholder="Datum rojstva" name="dat_roj" type="date" />
                                    </div>

                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Registriraj">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>