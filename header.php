<?php
include_once 'session.php';
include_once 'funkcije.php';
include_once 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <title>Moj Faks</title>

        <!-- Bootstrap -->


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body style="background-color:#f4f2ed; padding-bottom: 5%; ">

        <script>
            $(document).ready(function () {

                $("#drop-action").click(function () {

                    $("#drop").show();
                    $("#drop-action").hide();
                    $("#hide-action").show();


                });

                $("#hide-action").click(function () {

                    $("#drop").hide();
                    $("#hide-action").hide();
                    $("#drop-action").show();

                });
            });

        </script>

        <style>
            #drop-action{
                font-size: 1.5em; 
                display: block; 
                float: right; 
                margin-top: 1%; 
                margin-right: 1%;
                color:#dedcd7;
                display: block; 


            }

            #drop-action:hover{

                color:#101010; 
                cursor:default; 

            }

            #hide-action{
                font-size: 1.5em; 
                display: block; 
                float: right; 
                margin-top: -2%; 
                margin-right: 1%;
                color:#dedcd7;
                display: none;
            }

            #hide-action:hover{

                color:#101010;
                cursor: default; 
            }

            #home:hover, #forum:hover, #faculty:hover, #kviz:hover{

                -webkit-transform:scale(1.10); /* Safari and Chrome */
                -moz-transform:scale(1.10); /* Firefox */
                -ms-transform:scale(1.10); /* IE 9 */
                -o-transform:scale(1.10); /* Opera */
                transform:scale(1.10);

            }
            
            #pismo{
                color: #dedcd7;
            }
            #pismo:hover{
               color: #777;
            }




        </style>

        <?php if (empty($_SESSION['user_id'])) { ?>

            <nav class="navbar navbar-default" id="drop" style="  background-color: white; border-bottom: 1px solid #dedcd7; display: none; ">

                <ul class="nav nav-pills" style="margin-left:5%; margin-top:0.5em; margin-bottom: 0.5em; "> 
                    <li role="presentation" style="margin-right: 0.5em;"><a href="register.php" style="color:black;"><i  class="fa fa-user-plus"></i>Registriraj se</a></li>
                    <li role="presentation" style="margin-right: 0.5em;"><a href="login.php" style="color:black;"><i class="fa fa-sign-in"></i> Prijavi se</a></li>
                    <li role="presentation" style="margin-right: 0.5em;"><a href="fakultete.php" style="color:black;"><i class="fa fa-institution"></i> Fakultete</a></li>
                </ul>
            </nav>


            <i class="fa fa-chevron-down" id="drop-action" ></i></br>
            <i class="fa fa-chevron-up" id="hide-action"></i>

            <?php
        } 
        
        
        else {
            
            $query="SELECT * FROM uporabniki WHERE id='".$_SESSION['user_id']."'";
            $result=  mysqli_query($link, $query); 
            $row=  mysqli_fetch_array($result); 
            ?>
            <style>
                .badge-notify{
                    
                    background: #f1685e; 
                    position: absolute;
                    top:-1px; 
                    left:20px;
                    border: solid white medium;
                    font-size: 0.7em;
                    
                }
            </style>

            <nav class="navbar navbar-default" style="background-color: white; position:relative; ">
<?php 

$query2="SELECT COUNT(id) FROM sporocanje WHERE prejemnik_id=".$_SESSION['user_id']." AND status = 'unRead' ";
$result2=  mysqli_query($link, $query2); 
$row2=  mysqli_fetch_array($result2); 

?>
                <ul class="nav nav-pills" style="margin-left:5%; margin-top:0.5em; margin-bottom: 0.5em; "> 
                    <li id="home" role="presentation" style="margin-right: 0.5em; "><a href="index.php" style="color: rgb(34, 194, 34);"><i class="fa fa-home" style="color: rgb(34, 194, 34);"></i> Domov</a></li>
                    <li id="forum" role="presentation" style="margin-right: 0.5em;"><a href="forum.php" style="color:#febe29;"><i class="fa fa-comments" style="color:#febe29;"></i> Forum</a></li>
                    <li id="faculty" role="presentation" style="margin-right: 0.5em;"><a href="fakultete.php" style="color:#3e5e9a;"><i class="fa fa-institution" style="color:#3e5e9a;"></i> Fakultete</a></li>
                    <li id="kviz" role="presentation" style="margin-right: 0.5em;"><a href="kviz.php" style="color:#f1685e;"><i class="fa fa-question" style="color:#f1685e;"></i> Kviz</a></li>
                    
                    <li  role="presentation" style="">
                        <a href="sporocila.php" >
                            <?php if ($row2['0']>0){ ?>
                            <i id="pismo" class="fa fa-envelope" style=" color:#777;  font-size: 1.2em;"></i>
                            <span class="badge badge-notify"><?php echo $row2['0']; ?></span>
                            <?php }
                            else{ ?>
                                 <i id="pismo" class="fa fa-envelope" style="font-size: 1.2em;"></i>
                           
                                
                            <?php }
                            ?>
                        </a>
                    </li>
                    
                    <li  role="presentation" class="dropdown" style="float:right; margin-right: 2%; ">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-user"></i> <?php echo $_SESSION['ime']; ?><span class="caret"></span>
                            </button                         <!-- Left&Right pomakne menij na 0 na desni strani da je v liniji z gumbkom, 
                                                             na levi pa vzame prostora kolikor je širok menij avtomatsko -->
                            <ul class="dropdown-menu" style="right:0; left: auto;"  role="menu" aria-labelledby="dropdownMenu1" >
                                <?php if ($row['admin']==1){ ?>
                                <li role="presentation" class="disabled"><a role="menuitem" tabindex="-1"  ><i class="fa fa-trophy"></i> Admin</a></li>
                                     <hr style="margin:0 1em 0 1em;">
                                <?php } ?>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="profil.php" ><i class="fa fa-wrench"></i> Profil</a></li>
                                <hr style="margin:0 1em 0 1em;">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="logOut.php"><i class="fa fa-sign-out"></i> Odjava</a></li>

                            </ul>
                        </div>
                    </li>
                </ul>

            </nav>

        <?php } ?>