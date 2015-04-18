<?php
include_once 'header.php';
include_once 'funkcije.php';
include_once 'db.php';
include_once 'session.php';

$idTopic = (int) $_GET['id'];

$query = "SELECT * FROM  topic t INNER JOIN uporabniki u ON u.id=t.uporabnik_id WHERE t.id=" . $idTopic;
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
?>

<div class="col-lg-12 bg">
    <div class="row">
        <div class="col-lg-12">
            <h3 style="margin-left: 2%; color: #febe29;  "><?php echo $row['name']; ?></h3>
        </div>
    </div>
    <hr style="width: 96%; ">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-1"><img src="<?php echo $row['slika']; ?>" alt="slika" name="slika" style="border-radius: 50%; width: 5em; margin-left: 60%;   "/></div>
                <div class="col-lg-11"><h4 style="margin-left: 3%; margin-top: 2%; "><strong><?php echo $row['ime'] . " " . $row['priimek']; ?> </strong><small> - <?php echo $row['add_date']; ?></small></h4></div>
            </div>
            <br>
            <p style="margin-left: 12%; "><?php echo $row['question']; ?></p>
        </div>
    </div>
    <hr style="width: 96%; ">
    <div class="row">
        <div class="col-lg-12">

        </div>
    </div>
</div>



<div class="col-lg-12 bg" style="margin-top: 2em; ">
    <h4 style="margin-left: 2%; color: #febe29;  ">Odgovori:</h4>
    <hr>
    <div class="form-group">
        <textarea id="answer" required="required" class="form-control" placeholder="Vaš odgovor" style="resize: vertical;" name="ans"></textarea>
    </div>
    <div class="modal-footer">
        <button id="clear" type="button" onclick="Reset()" class="btn btn-default" ><i class="fa fa-times"></i> Prekliči </button>
        <input type="submit" id="submitAnswer" class="btn btn-warning" value="Odgovori">
    </div>
</div>

<div class="col-lg-12 warnings" >
<div id="SuccessAlert" class="alert alert-success" role="alert" style="/*display:none;*/ "></div>
</div>

<script>
    function Reset() {
        document.getElementById("answer").value = "";

    }
</script>

<style>
    .bg{
        border-top-style: solid ;
        border-top-color: #febe29; 
        background-color: white;
        box-shadow: 1px 1px 2px #bbbbbb;
        margin:0 auto 0 5%; 
        position:relative; 
        width: 90%; 
        padding-bottom: 2%; 

    }
    
    .warnings{
        margin:0 auto 0 4%; 
        position:relative; 
        width: 92%; 
    }

</style>