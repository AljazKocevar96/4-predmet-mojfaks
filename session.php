<?php
session_start();

if(empty($_SESSION['user_id'])&&
        $_SERVER['REQUEST_URI']!= "/MojFaks/register.php"&&
        $_SERVER['REQUEST_URI']!= "/MojFaks/login.php"&&
        $_SERVER['REQUEST_URI']!= "/MojFaks/loginCheck.php"&&
        $_SERVER['REQUEST_URI']!= "/MojFaks/funkcije.php"){
    
    header("Location:login.php"); 
        }
?>
