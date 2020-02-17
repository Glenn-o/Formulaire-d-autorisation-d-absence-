<?php 
if(!(empty($_POST['name']) || empty($_POST['mail']) || empty($_POST['date1']) || empty($_POST['date2']) || empty($_POST['motif']))){
//recuperation des données
setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
echo isset($POST['name']);
$nom = $_POST['name'];
$formation = $_POST['formation'];
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];
$motif = $_POST['motif'];
$today = date("j F, Y");
$mail = $_POST['mail'];
$signature = "$nom, $formation, $mail, certifie avoir rempli ce formulaire.";;

echo $signature;
}

// define variables and set to empty values
$nameErr = "";
$formationErr = "";
$dateErr = "";
$motifErr = "";
$emailErr = "";

//<?php echo htmlspecialchars($name);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Le nom est obligatoire";
  }
  if (empty($_POST["mail"])) {
    $emailErr = "l'Email est obligatoire";
  }
  if (empty($_POST["motif"])) {
    $motifErr = "Le motif est obligatoire";
  }
  if (empty($_POST["date1"]) AND empty($_POST["date2"])) {
    $dateErr = "Veuillez remplir tous les champs";
  } 
  else if(empty($_POST["date1"])){
    $dateErr = "Veuillez remplir tous les champs";
  }
  else if(empty($_POST["date2"])){
    $dateErr = "Veuillez remplir tous les champs";
  }
  else if(isset($_POST['date1']) AND isset($_POST['date2'])){
    $date1 = $_POST["date1"];
    $date2 = $_POST["date2"];
  }
 
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
        <form method="POST" action="<?php
        if(empty($_POST['name']) || empty($_POST['mail']) || empty($_POST['date1']) || empty($_POST['date2']) || empty($_POST['motif'])){
            echo htmlspecialchars($_SERVER['PHP_SELF']);
            $MessageEnvoye = "";
        }else{
            $MessageEnvoye = "Votre message a bien été envoyé !";
        }
        ?>">
            <div id="nom_formation">
                <div id="nom_div">
                    <label for="name" id="label_name">Nom <span>*</span></label>
                    <input id="name" type="text" name="name" value="<?php if(!empty($_POST['name']))
                    {
                       echo $_POST['name'];
                    }
                        ?>">
                    <span><?php echo $nameErr;?></span>
                </div>
                <div id="formation_div">
                    <label for="formation" id="label_formation">Formation <span>*</span></label>
                    <select id="formation" name="formation">
                        <option>Developpeur informatique 2019</option>
                        <option>Developpeur informatique 2020</option>
                        <option>Developpeur informatique 2019</option>
                        <option>Developpeur informatique 2019</option>
                    </select>
                </div>
            </div>
            <div id="email_div">
                <label for="email" id="label_email">Email <span>*</span></label>
                <input id="mail" type="email" name="mail" value="<?php if(!empty($_POST['mail']))
                    {
                       echo $_POST['mail'];
                    }
                        ?>">
                <span><?php echo $emailErr;?></span>

            </div>
            
            <div id="date_block"> <!-- DATE BLOCK -->
                <div id="date1_div">
                    <label for="date1" id="label_date_du">Du</label>
                    <input id="date1" type="date" name="date1" value="">
                    <label for="date2" id="label_date_au">au </label>
                    <input id="date2" type="date" name="date2" value="">
                    <span><?php echo $dateErr;?></span>
                </div>
            </div> <!-- END DATE BLOCK -->

            <div id="motif">
                <label for="motif" id="label_motif">Motif <span>*</span></label>
                <input id="input_motif" type="text" name="motif" value="<?php if(!empty($_POST['motif']))
                    {
                       echo $_POST['motif'];
                    }
                        ?>">
            </div>
  
            <div id="signature">
                <label for="signature" id="label_signature">Je donne mon accord pour la Signature éléctronique <span>*</span></label>
                <input id="input_signature" type="checkbox" name="signature">
            </div>

            <div id= "date_now">
                <p id="fait_le_p">Fait le : </p>
            </div>
          
            <div id="submit">        
                <input type="submit" name="bouton" id="input_submit" value="envoyer">
            </div>
            
        </form>
        <h2><?php echo $MessageEnvoye;?></h2>
    </div>
    <script src="../js/script.js"></script>
 </section>       
</body>
</html>
