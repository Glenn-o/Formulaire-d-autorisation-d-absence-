<?php

//fonction envoie de mail
function sendmail(){
    $to = "glenn.oberle@viacesi.fr";
    $subject = "Absence";
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $message = "Bonjour c'est " . $nom . " de la formation " . $formation . " Le motif de mon absence est " . $motif . ", je serais absent du " . $date1 . " a " . $time1 . " au " . $date2 . " jusqu'à " . $time2;
    mail($to, $subject, $message, $headers);
} 

if(!(empty($_POST['name']) || empty($_POST['mail']) || empty($_POST['date1']) || empty($_POST['date2']) || empty($_POST['motif']))){
//recuperation des données
setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
echo isset($POST['name']);
$nom = $_POST['name'];
$formation = $_POST['formation'];
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];
$time1 = $_POST['time1'];
$time2 = $_POST['time2'];
$motif = $_POST['motif'];
$today = date("j F, Y");
$email = $_POST['mail'];

require('../fpdf/fpdf.php');
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetAuthor('CESI');
$pdf->SetTitle('Demande d\'absence');
$pdf->SetFont('Helvetica', '', 20);
$pdf->Cell(40, 10, 'Hello World !');
$pdf->Output('exemple.pdf', 'F');

sendmail();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demande d'autorisation d'absence</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
</head>
<body>
 <section id="global">
     <img src="../images/logo-CESI.png" alt="logo cesi" id="logo">

    <div id="form">
        <h1>Formulaire de demande d'absence</h1>
        <p class="required"><?php if(empty($_POST['name']) || empty($_POST['mail']) || empty($_POST['date1']) || empty($_POST['date2']) || empty($_POST['motif'])){
            echo "Tous les champs doivent être remplis";
        } ?></p>
        <form method="POST" action="<?php
        if(empty($_POST['name']) || empty($_POST['mail']) || empty($_POST['date1']) || empty($_POST['date2']) || empty($_POST['motif'])){
            echo htmlspecialchars($_SERVER['PHP_SELF']);
            $MessageEnvoye = "";
        }else{
            $MessageEnvoye = "Votre message a bien été envoyé !";
        }
        ?>">
            <div id="nom_div">
                <label for="input_name" id="label_name">Nom</label>
                <input id="input_name" type="text" name="name" value="<?php if(!empty($_POST['name']))
                {
                    echo $_POST['name'];
                }
                    ?>">
            </div>
            <div id="formation_div">
                <label for="input_formation" id="label_formation">Formation</label>
                <select id="input_formation" name="formation">
                    <option>Developpeur informatique 2019</option>
                    <option>Developpeur informatique 2020</option>
                    <option>Developpeur informatique 2021</option>
                    <option>Developpeur informatique 2022</option>
                </select>
            </div>
            <div id="email_div">
                <label for="input_mail" id="label_email">Email</label>
                <input id="input_mail" type="email" name="mail" value="<?php if(!empty($_POST['mail']))
                    {
                       echo $_POST['mail'];
                    }
                        ?>">
            </div>
            
            <div id="date_block"> 
                <div id="date1_div"><!-- DATE BLOCK -->
                    <label for="date1" id="label_date_du">Du</label>
                    <input id="date1" type="date" name="date1" value="">

                    <label id="label_time1" for="time1">à partir de :</label>
                    <input id="time1" type="time" name="time1" value="">
                </div><!-- END DATE BLOCK -->
                <div id="date2_div">
                    <label for="date2" id="label_date_au">Au</label>
                    <input id="date2" type="date" name="date2" value="">
                    
                    <label id="label_time2" for="time2">jusqu'à :</label>
                    <input id="time2" type="time" name="time2" value="">
                </div><!-- END DATE BLOCK -->
            </div> 

            <div id="motif">
                <label for="motif" id="label_motif">Motif</label>
                <input id="input_motif" type="text" name="motif" value="<?php if(!empty($_POST['motif']))
                    {
                       echo $_POST['motif'];
                    }
                        ?>">
            </div>
  
            <div id="signature">
                <label for="input_signature" id="label_signature">Je donne mon accord pour la Signature éléctronique et reconnait l'exactitude des informations fournies</label>
                <input id="input_signature" type="checkbox" name="signature">
            </div>

            <div id= "date_now">
                <p id="fait_le_p">Fait le : </p>
            </div>
          
            <div id="submit">        
                <input type="submit" name="bouton" id="input_submit" value="envoyer">
            </div>
            
        </form>
        <h2><span><?php echo $MessageEnvoye;?></span></h2>
    </div>
    <script src="../js/script.js"></script>
 </section>       
</body>
</html>