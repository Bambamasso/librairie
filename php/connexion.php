<?php

 session_start();
 if(!empty($_POST['email']) && !empty($_POST['motDePasse'])){
   
    $email=$_POST['email'];
    $motDePasse= $_POST['motDePasse'];

     //connexion à la base de donnée
     $connexion=mysqli_connect ('localhost','root', '','librairie');
     if(!$connexion){
      die('erreur de connexion');
     }

     $select="SELECT * FROM users WHERE email='$email' && motPasse='$motDePasse'";
      $requet=mysqli_query($connexion,$select);
      if($requet){
        //   echo"selection validé";
          $affiche=mysqli_fetch_assoc($requet);
        //   var_dump($affiche);
    
          if($affiche){
            $_SESSION['user_id']=$affiche['id'];
    
            header('LOCATION:../connecter/index.php');
          }else{
            //  $message="mot de passe où email incorrecte";
            $select2="SELECT * FROM admin WHERE email='$email' && motPasse='$motDePasse'";
        $requet2=mysqli_query($connexion,$select2);
        if($requet2){
            // echo"selection validé";
          $affiche2=mysqli_fetch_assoc($requet2);
        //  var_dump($affiche2);
          if($affiche2){
            $_SESSION['admin_id']=$affiche2['id'];
            header('LOCATION:../admin/index.php');
          }else{
            $message="mot de passe où email incorrecte";
          }
        }
          }
    }
      //admin
      else{
        
       
      }
      

 }
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
    <link type="text/css" rel="stylesheet" href="../css/connexion.css">
</head>
<body>
    <nav class="nav">
        <div class="onglets">
           <p class="logo"><img src="./image/Capture_d_écran_2023-10-05_à_14.35.01-removebg-preview.png" width="50px" alt=""></p>
           <input type="checkbox" id="barre">
           <label for="barre">Menu</label>
           <div class="droit">
               <ul>
                   <li> <a href="../index.php">Accueil</a></li>
                   <li><a href="">Contact</a></li>
                   <li><a href="">Categorie+</a>
                        <ul>
                            <li><a href="./categorie-croissance.php">Croissance personnel</a></li>
                            <li><a href="./categorie-humain.php">Psychologie et comportement humain</a></li>
                            <li><a href="./categorie-motivation.php">Motivation-Inspiration</a></li>
                            <li><a href="./categorie-confiance.php">Confience en soi</a></li>
                              <!-- <li><a href="">lorem</a></li> -->
                        </ul>
  
                      </li>
  
                  </ul>
              </div>
         </div>
          <div class="gauche">
             <input type="search" placeholder="recherhce..">
            <ul>
              <a href="./php/connexion.php"><img src="../image/user.png" alt=""></a>
             <a href=""><img src="../image/panier.png" alt=""></a>
            </ul>
          </div>
      </nav>
  <!--fin barre de navigation  -->
    <div class="inscription">
        <div class="cardre">
           <div class="bve">
             <p>Bienvenue sur notre page de connexion </p>
           </div>
           <div class="formule">
              <form action="" method="post">
                 <p class="logo">
                     <img src="../image/Capture_d_écran_2023-10-05_à_14.35.01-removebg-preview.png" alt="" width="60px">
                  </p>
                  
                  <label for="email">Email</label><br>
                  <input type="email" name="email" id="email"><br><br><br>
                  <label for="motDePasse">Mot de passe</label><br>
                  <input type="password" name="motDePasse" id="motDePasse"><br><br><br>
                  <input type="submit" value="connexion" id="submit"><br>
                 <?php
                 if(!empty($message)){echo $message;}?> 
                  <p>Vous n'avez pas de compte? <a href="./inscription.php">creer un compte</a></p>

              </form>
             
           </div>
         </div>
     </div>
 
     <!-- debut du footer -->
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
    <div class="adresse">
        <div class="navigation">
            <h3>Suivez-nous sur:</h3>
            <div class="reseaux">
                <div class="img"><img src="../image/facebook.png" alt=""></div>
                <div  class="img"><img src="../image/instagram.png" alt=""></div>
                <div  class="img"><img src="../image/tiktok.png" alt=""></div>
                <div  class="img"><img src="../image/twitter.png" alt=""></div>
            </div>
       </div>
       <div class="navigation">
        <h3>Navigation</h3>
           <ul>
            <li>Acceuil</li>
            <li>Contact</li>
            <li>Catégories</li>
           </ul>
       </div>
       <div class="navigation">
        <h3>Categorie</h3>
        <ul>
            <li>Croissance personnel</li>
            <li>Psychologie et Comprtement humain</li>
            <li>Santé et bien-être</li>
            <li>Motivation-Inspiration</li>
            <li>Dévelppement Competence</li>
            <li>Confience en soi</li>
           </ul>
       </div>
    </div>
</footer>

</body>
</html>