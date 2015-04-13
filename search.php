<?php

include_once 'db.php';
include_once 'funkcije.php';

$KljucneBesede = clean_post($_POST['iskano']);

$query = "SELECT * FROM fakultete WHERE (ime LIKE '%" . $KljucneBesede . "%') OR (kratica LIKE '%" . $KljucneBesede . "%')";
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_array($result)) {

    echo "<a href=\"fakulteta.php?id=".$row['id']."\">"
            . "<li class=\"list-group-item\">"
            . "<div class=\"row\">"
            . "<div class=\"col-lg-11\">"
            . "<h4>".$row["ime"]."</h4>"
            . "</div>"
            . "</div>"
            . "</li>"
            . "</a>"; 
}
    

?>