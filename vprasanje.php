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
            <p style="margin-left: 12%; margin-right: 5%; "><?php echo $row['question']; ?></p>
        </div>
    </div>
    <hr style="width: 96%; ">
    <div class="row">
        <div class="col-lg-12">

        </div>
    </div>
</div>

<div class="col-lg-12 warnings " >
    <div id="SuccessAlert" class="alert alert-success" role="alert" style="display: none; "><strong>Komentar objavljen</strong></div>
</div>
<div class="col-lg-12 warnings" >
    <div id="WarningAlert" class="alert alert-warning" role="alert" style=" display: none; "><strong>Ups. Malo več pa le  napišite.</strong></div>
</div>

<div id="WriteAnswer"  class="col-lg-12 bg" style="margin-top: 1em; ">
    <h4 style="margin-left: 2%; color: #febe29;  ">Napišite svoje mnenje:</h4>
    <hr>
    <blockquote style="display:none; " id="QuoteArea">
        <p><i class="fa fa-quote-right" style="color: #ddd;  font-size:0.8em;   "></i> <strong id="quote" style="font-size: 1.5em; "></strong></p>
        <footer id='AnswerAuthor' ></footer>
    </blockquote>
    <div class="form-group">
        <textarea id="answer" rows="5" required="required" class="form-control" placeholder="Vaš odgovor" style="resize: vertical;" name="ans"></textarea>
    </div>
    <div class="modal-footer">
        <button id="clear" type="button" onclick="Reset()" class="btn btn-default" ><i class="fa fa-times"></i> Prekliči </button>
        <button id="submitAnswer" class="btn btn-warning">Odgovori</button>
    </div>
</div>




<?php
$queryAnswer = "SELECT * FROM thread_answers t INNER JOIN uporabniki u ON u.id=t.uporabnik_id WHERE topic_id=" . $idTopic . " ORDER BY t.id DESC";
$resultAnswer = mysqli_query($link, $queryAnswer);

while ($rowAnswer = mysqli_fetch_array($resultAnswer)) {
    ?> 
    <div id="overall<?php echo $rowAnswer['0']; ?>" class="col-lg-12 bg" style="margin-top: 2em;">

        <div class="row">
            <div class="col-lg-12">
                <div class="row" style="margin-top:1.5%; ">
                    <div class="col-lg-1" style="padding-right:0;"><img src="<?php echo $rowAnswer['slika']; ?>" alt="slika" name="slika" style="border-radius: 50%; width: 3.5em; margin-left: 20%;"/></div>
                    <div class="col-lg-11" style="padding-left:0;"><h4 style="margin-left: 0.5%; margin-top: 2%; "><a href="global_profile.php?id=<?php echo $rowAnswer['id']; ?>"><strong id='name<?php echo $rowAnswer['0']; ?>'><?php echo $rowAnswer['ime'] . " " . $rowAnswer['priimek']; ?> </strong></a></h4></div>
                </div>
                <hr>
                <br>
                <?php if (!empty($rowAnswer['answer_to'])) { ?>
                    <blockquote  id="QuotedAnswer">
                        <p><i class="fa fa-quote-right" style="color: #ddd;  font-size:0.8em;"></i> <strong style="font-size: 1.5em;"><?php echo $rowAnswer['answer_to']; ?></strong></p>
                        <footer ><?php echo $rowAnswer['author']; ?></footer>
                    </blockquote>
                <?php } ?>
                <p id="quoting<?php echo $rowAnswer['0']; ?>" style="margin-left: 7%; margin-right: 5%; "><?php echo $rowAnswer['answer']; ?></p>
            </div>
        </div>
        <hr><!-- za ID vzamem ORIGINALEN ID IZ BAZE, da ima vsak komentar vse id-je UNIKATNE za lažje delo -->
        <small id="<?php echo $rowAnswer['0']; ?>" class="odgovor" onclick="GetID(this)">Odgovori</small>
    </div>
    <script>
        function GetID(elementID) {
            var id = elementID.id; // V elementID DOBI ID DIVA KOMENTARJA  
            var AnswerID = "#quoting" + id;
            var AurhorID = "#name" + id;

            var answertext = $(AnswerID).text();
            var authorname = $(AurhorID).text();
            $("#QuoteArea").show(); // pokaže div ki je narejen da pokaže tekst na katerega odgovarjam  
            $("#quote").text(answertext); // da tekst na katerega uporabnik odgovarja v sekcijo kjer lahko pišemo komentar
            $("#AnswerAuthor").text(authorname); // pod citat katerega komentiramo nam poda ime da vemo kdo ga je napisal
        }
    </script>




    <style>
        .odgovor{
            margin-left: 3%; 
            color:#269abc; 

        }
        .odgovor:hover{
            text-decoration: underline;
            color:#febe29;
            cursor: pointer;


        }
    </style>
<?php } ?>



<script>
    function Reset() {
        document.getElementById("answer").value = "";

    }
</script>
<script>
    $('#submitAnswer').click(function () {

        var tid =<?php echo $idTopic ?>;
        var input = $('#answer').val();
        var InputLenght = input.length;// varnost da uporabnik ne more spammati praznih sporočil
        var ImePriimek = '<?php echo $_SESSION['ime'] . " " . $_SESSION['priimek']; ?>';
        
        var AnswerTo = $("#quote").text();// tekst na katerega odgovarjamo. počrpa ga iz sekcije kjer odgovarjamo za ajax in zapis v bazo
        var AuthorName = $("#AnswerAuthor").text(); // Avtor taksta na katerega odgovarjamo. tudi počrpa iz sekcije kjer odgovarjamo da lahko zapiše v bazo
       
    
    if (InputLenght > 2 || input === " ") {

            $.ajax({
                url: "answer_write.php",
                type: "POST",
                data: {odgovor: $('#answer').val(), TopicId: tid, quote: AnswerTo, author: AuthorName},
                success: function () {
                    $("#SuccessAlert").slideDown();
                    setTimeout(function () {
                        $("#SuccessAlert").slideUp();
                    }, 1500);
                }
            });
            
            var domEL; 
            
            if(AnswerTo.length === 0){
                 domEL = $("<div class=\"col-lg-12 bg\" style=\"margin-top: 2em; display: none; opacity: 0; width: 50%; margin-bottom: 1em;\" id=\"posting\">\n\
                         <div class=\"row\">\n\
                         <div class=\"col-lg-12\">\n\
                         <div class=\"row\" style=\"margin-top:1.5%; \">\n\
                         <div id=\"pic\" class=\"col-lg-1\" style=\"padding-right:0;\"><img src=\"slike/default.png\" alt=\"slika\" name=\"slika\" style=\"border-radius: 50%; width: 3.5em; margin-left: 20%;\"/></div>\n\
                         <div id=\"user\" class=\"col-lg-11\" style=\"padding-left:0;\"><h4 style=\"margin-left: 0.5%; margin-top: 2%; \"><strong id=\"imePriimek\"> </strong></h4></div>\n\
                         </div>\n\
                         <hr>\n\
                         <br>\n\
                         <p id=\"written\" style=\"margin-left: 7%; margin-right: 5%; \"></p>\n\
                         </div>\n\
                         </div>\n\
                         <hr>\n\
                         </div>");//dizajn celega diva ki ga mora prikazati ko uporabnik komentira napisan v spremenljivki za lažjo kontrolo
                             
                         }
            
            else{
                 domEL = $("<div class=\"col-lg-12 bg\" style=\"margin-top: 2em; display: none; opacity: 0; width: 50%; margin-bottom: 1em;\" id=\"posting\">\n\
                         <div class=\"row\">\n\
                         <div class=\"col-lg-12\">\n\
                         <div class=\"row\" style=\"margin-top:1.5%; \">\n\
                         <div id=\"pic\" class=\"col-lg-1\" style=\"padding-right:0;\"><img src=\"slike/default.png\" alt=\"slika\" name=\"slika\" style=\"border-radius: 50%; width: 3.5em; margin-left: 20%;\"/></div>\n\
                         <div id=\"user\" class=\"col-lg-11\" style=\"padding-left:0;\"><h4 style=\"margin-left: 0.5%; margin-top: 2%; \"><strong id=\"imePriimek\"> </strong></h4></div>\n\
                         </div>\n\
                         <hr>\n\
                         <br>\n\
                         <blockquote  id=\"QuotedAnswer\">\n\
                         <p><i class=\"fa fa-quote-right\" style=\"color: #ddd;  font-size:0.8em;\"></i> <strong style=\"font-size: 1.5em;\">"+AnswerTo+"</strong></p>\n\
                         <footer>"+AuthorName+"</footer>\n\
                         </blockquote>\n\
                         <p id=\"written\" style=\"margin-left: 7%; margin-right: 5%; \"></p>\n\
                         </div>\n\
                         </div>\n\
                         <hr>\n\
                         </div>");
                
                         }

            $("#WriteAnswer").after(domEL); //postavi dani div za specificiranim elementom, ki sem ga določil v prvem objektu. FUNKCIJA AFTER DELA DIREKTNO Z DOM-OM 


            //poskus, ki ni deloval v redu. FUNKCIJA APPEND. NI DELOVALO KER JE BIL DIV ŽE NAPISAN V HTMLJU IN OB KLIKU V DOM NI DODALO NOVEGA DIVA PAČ PA SAMO
            // ZAMENJALO TEKST V STAREM
            /*$("#smth").append("<div class=\"col-lg-12 bg\" style=\"margin-top: 2em; display: none; opacity: 0; width: 50%; margin-bottom: 1em;\" id=\"posting\">\n\
             <div class=\"row\">\n\
             <div class=\"col-lg-12\">\n\
             <div class=\"row\" style=\"margin-top:1.5%; \">\n\
             <div id=\"pic\" class=\"col-lg-1\" style=\"padding-right:0;\"><img src=\"slike/default.png\" alt=\"slika\" name=\"slika\" style=\"border-radius: 50%; width: 3.5em; margin-left: 20%;\"/></div>\n\
             <div id=\"user\" class=\"col-lg-11\" style=\"padding-left:0;\"><h4 style=\"margin-left: 0.5%; margin-top: 2%; \"><strong id=\"imePriimek\"> </strong></h4></div>\n\
             </div>\n\
             <hr>\n\
             <br>\n\
             <p id=\"written\" style=\"margin-left: 7%; margin-right: 5%; \"></p>\n\
             </div>\n\
             </div>\n\
             <hr>\n\
             </div>"); */

            $("#written").text(input);
            $("#imePriimek").text(ImePriimek);
            Reset();
            $("#QuoteArea").slideUp();
            setTimeout(function () {
                $('#posting').show();
                $("#posting").animate({// ANIMIRA POMIK Z 1EM TOP MARGINA, SPREMENI PROSOJNOST IZ 0 NA 100, DIV PODALJŠA IN AVTOMATSKO DOLOČI KAKŠNO VIŠINO POTREBUJE
                    top: '1em',
                    opacity: '1',
                    width: '90%',
                    height: 'auto'

                }, 600);//ANIMACIJA SE IZVEDE V 600 MILISEKUNDAH 
            }, 200);//NASTAVIL SEM 200 MILISEKUND ZAMIKA MED GENERACIJO DIV IN ANIMACIJO DA LEPŠE SPROCESIRA 
        }

        else {
            $("#WarningAlert").slideDown();
            setTimeout(function () {

                $("#WarningAlert").slideUp();
            }, 1500);
        }

    });
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
        margin-top: 1%; 
        margin-left: 4%; 
        padding-bottom:0%;  
        position:relative; 
        width: 92%; 
    }

</style>