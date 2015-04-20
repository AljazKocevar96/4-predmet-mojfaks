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
            background-image: url(slike/ozadje.jpg);
            z-index:-1;
        }
    </style>
    <script>
        $(document).ready(function(){
        
        var LogStat = '<?php echo $_SESSION['login_stat']; ?>';
         '<?php unset($_SESSION['login_stat']); ?>';
        
        if(LogStat === "fail"){
            
            $("#LogWarning").show(); 
            
            setTimeout(function(){
               
               $("#LogWarning").fadeOut(1500); 
                
            },2000);
            
        }
        
          
    });
    </script>
    
    <div id="LogWarning" class="alert alert-danger" role="alert" style="margin-top:14%; margin-left: 37%; width:26%; display: none;"><center><strong>Napaka </strong>v prijavi. </center></div>
     
     
    <div id="fullscreen_bg" class="fullscreen_bg">

        <div class="container" style=" margin: 20% auto 0 auto; position: relative;  ">
            <div class="row vertical-offset-100">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                            <h3 class="panel-title">Prijavi se</h3>
                        </div>
                        
                        <div class="panel-body">
                            <form method="post" action="loginDo.php" role="form">
                                <fieldset>
                                    
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></span>
                                        <input class="form-control" placeholder="E-mail" name="email" type="text"/>
                                    </div>
                                    
                                    <div class="input-group" style="margin-top:3%; ">
                                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-lock"></i></span>
                                        <input class="form-control" placeholder="Geslo" name="pass" type="password" />
                                    </div>
                                    <div class="row" style="margin-top:3%; ">
                                        <div class="col-lg-12" >
                                    <input class="btn btn-lg btn-success btn-block" style=" " type="submit" value="Prijavi se">
                                        </div>
                                        
                                    </div>
                                    <hr style="margin-top:3%;">
                                    <a href="register.php" style="margin-top:0%; padding-bottom: 1%;">Še morda nimate računa ?</a>
                                    
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>