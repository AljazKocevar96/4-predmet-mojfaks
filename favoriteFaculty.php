<?php
include_once 'db.php';
include_once 'funkcije.php';
include_once 'session.php';


$state = $_POST['state'];
$IdFakultete = $_POST['IDfac'];
$datum = date("d:m:y H:m:s");

$queryState = "SELECT * FROM favoritefaculty";
$resultState = mysqli_query($link, $queryState);
$row = mysqli_fetch_array($resultState);

$queryCheck = "SELECT state FROM favoritefaculty WHERE ((user_id='" . $_SESSION['user_id'] . "') AND (faculty_id='" . $IdFakultete . "'))";
$resultCheck = mysqli_query($link, $queryCheck);


if (!empty($state) && !empty($IdFakultete)) {

    if (mysqli_num_rows($resultCheck) == 0) {
        $Query = "INSERT INTO favoritefaculty (user_id, faculty_id, state, date) VALUES ('" . $_SESSION['user_id'] . "','" . $IdFakultete . "','" . $state . "','" . $datum . "') ";
        $result = mysqli_query($link, $Query);
   }
    
    else{

    if ($row['state'] == "favorited") {

        $queryUpdate = "UPDATE favoritefaculty SET state = 'unFavorited' WHERE faculty_id='" . $IdFakultete . "' AND user_id='" . $_SESSION['user_id'] . "'";
        $resultUpdate = mysqli_query($link, $queryUpdate);
    }


    if ($row['state'] == "unFavorited") {

        $queryUpdate2 = "UPDATE favoritefaculty SET state = 'favorited' WHERE faculty_id='" . $IdFakultete . "' AND user_id='" . $_SESSION['user_id'] . "'";
        $resultUpdate2 = mysqli_query($link, $queryUpdate2);
    }
    
    }
}

else {
    
}
?>
