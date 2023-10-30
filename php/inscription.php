<?php
  //vérification des champs
function escape($valeur){
    return trim(strip_tags($valeur));
}

 //vérifie si le champs ne sont pas vide

 if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['motDePasse'])){
  //recuperation des données dans des variable
     $nom= escape($_POST['nom']);
     $prenom= escape($_POST['prenom']);
     $email= escape($_POST['email']);
     $motDePasse= escape($_POST['motDePasse']);
     $confirmation=escape($_POST['cMotDePasse']);

     if(empty($nom) || strlen($nom)<2){
        $err_nom="Erreur sur le nom";
     }

     if(empty($prenom) || strlen($prenom)<2){
        $err_prenom="Erreur sur le prenom";
     }

     if(empty($email) || strlen($email)<2){
        $err_email="Erreur sur l'email";
     }

     if(empty($motDePasse) || strlen($motDePasse)<2){
        $err_motDePasse="Erreur sur le mot de passe";
     }

     if(empty($confirmation) ){
        $err_confirmation ="Erreur sur le mot de passe de confirmation";
     }
     if($confirmation  != $motDePasse){
        $err_confirmation="le mot de passe de confirmation est different du mot de passe";
     }

     //connexion à la base de donnée
     if(!isset($err_nom) && !isset($err_prenom)&& !isset($err_email)&& !isset($err_motDePasse) && !isset($err_confirmation)){

        // $connexion=mysqli_connect('localhoste', 'root', '', 'librairie');
        require_once('../config.php');
    
      //insertion dans la base donnée
      $insert="INSERT INTO users (nom, prenom, email, motPasse)";
      $insert.="VALUES('$nom', '$prenom', '$email', '$motDePasse')";
      $requet=mysqli_query($connexion, $insert);
      if($requet){
        echo "insertion validé";
      }

       header("LOCATION:./connexion.php");
     }
    
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link type="text/css" rel="stylesheet" href="../css/inscription.css">

</head>
<body>

    <nav class="nav">
        <div class="onglets">
        <p class="logo"  style="color:#010c37;font-size:30px;color:white;margin-left:20px;">BmLibrairie</p>
           <input type="checkbox" id="barre">
           <label for="barre">Menu</label>
           <div class="droit">
               <ul>
                   <li> <a href="../inedx.php">Accueil</a></li>
                   <!-- <li><a href="">Contact</a></li> -->
                   <li><a href="">Categorie+</a>
                        <ul>
                         <li><a href="#">Croissance personnel</a></li>
                         <li><a href="#">Psychologie et comportement humain</a></li>
                         <li><a href="#">Motivation-Inspiration</a></li>
                         <li><a href="#">Confience en soi</a></li>
                           <!-- <li><a href="">lorem</a></li> -->
                        </ul>
  
                      </li>
  
                  </ul>
              </div>
         </div>
          <div class="gauche">
             <!-- <input type="search" placeholder="recherhce.."> -->
            <ul>
              <a href="./connexion.php"><img src="../image/user.png" alt=""></a>
             <a href=""><img src="../image/panier.png" alt=""></a>
            </ul>
          </div>
      </nav>
  <!--fin barre de navigation  -->
    <div class="inscription">
       <div class="cardre">
          <div class="bve">
            <p>Bienvenue sur notre page d'inscription </p>
          </div>
          <div class="formule">
             <form action="" method="post">
                <p class="logo">
                    <img src="../image/Capture_d_écran_2023-10-05_à_14.35.01-removebg-preview.png" alt="" width="60px">
                 </p>
                 <label for="nom" >Nom</label><br>
                 <input type="text" name="nom" id="nom"><br><br>
                 <?php if(!empty($err_nom)){
                    echo $err_nom;
                 } 
                 ?><br>
                 <label for="prenom">Prenom</label><br>
                 <input type="text" name="prenom" id="prenom"><br><br><br>
                 <?php if(!empty($err_prenom)){
                    echo $err_prenom;
                 } 
                 ?>
                 <label for="email">Email</label><br>
                 <input type="email" name="email" id="email"><br><br><br>
                 <?php if(!empty($err_email)){
                    echo $err_email;
                 } 
                 ?>
                 <label for="motDePasse">Mot de passe</label><br>
                 <input type="password" name="motDePasse" id="motDePasse"><br><br><br>
                 <?php if(!empty($err_motDePasse)){
                    echo $err_motDePasse;
                 } 
                 ?>
                 <label for="cMotDePasse">Confirmer mot de passe</label><br>
                 <input type="password" name="cMotDePasse" id="cMotDePasse"><br><br>
                 <?php if(!empty($err_confirmation)){
                    echo $err_confirmation;
                 } 
                 ?>
                 <input type="submit" value="s'inscrire" id="submit">

             </form>
          </div>
        </div>
    </div>
    <footer>
        <div class="info">
            <div class="livraison">
              <img src="../image/fast-delivery.png" alt="7542154"  width="50px" >
              <p>Livraison sous 24h/48h</p>
             
            </div>
            <div class="livraison">
              <img src="../image/atm.png" alt="7542154" width="50px">
              <p>Retrait gratuit en librairie</p>
            </div>
            <div class="livraison">
             <img src="../image/credit-card.png" alt="7542154"  width="50px">
              <p>Paiement securisé</p>
            </div>
            <div class="livraison">
                <img src="../image/24-hours-support.png" alt="7542154" width="50px" >
                <p>Service client de 9h à 17h</p>
            </div>
        </div>
        <div class="contact">
      <div class="contacte">
        <h1>Contactez-nous</h1>
        <p>Vous avez des question où des préocupations <br> svp contactez-nous </p>
      </div>
      <div class="adresses">
      <div class="adresse">
          <div><img src="../image/telephone.png" alt="n"></div>
          <div><p>+2250102431214</p></div>
        </div>
        <div class="adresse">
          <div><img src="../image/mail.png" alt="n"></div>
          <div><p>bambamasso51gmail.com</p></div>
        </div>
        <div class="adresse">
          <div><img src="../image/location.png" alt="n" width="30px"></div>
          <div><p>Abidjan, Abobo biabou</p></div>
        </div>
      </div>
   </div>
    </footer>
    
</body>
</html>