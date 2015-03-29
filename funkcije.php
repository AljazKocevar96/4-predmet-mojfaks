<?php
include_once 'db.php'; 
include_once 'session.php';

function clean_post($string) {
    return preg_replace("/[^a-zA-Z0-9ČĆŽŠĐčćžđš@!:;?=\'\,()*\/_|+\.-] /", '', $string);
}


?>