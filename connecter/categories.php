
<?php
session_start();
$connexion=mysqli_connect ('localhost','root', '','librairie');
if(!$connexion){
 die('erreur de connexion');
}

if(!empty($_SESSION['user_id'])){
  $sessionUserId = $_SESSION['user_id'];

  $select="SELECT * FROM users WHERE id = '$sessionUserId'";
  $requet=mysqli_query($connexion,$select);
  $recup=mysqli_fetch_assoc($requet);
   
  if($recup){
      // var_dump($recup);
  }else{
      die("utilisateur inconnu");
  }

}else{
  header('LOCATION:../php/connexion.php');
}

//table des categorie
$selection="SELECT *FROM categorie ";
$execute=mysqli_query($connexion,$selection);
if($execute){
  // echo "selection validé";
  $affiches=mysqli_fetch_all($execute,MYSQLI_ASSOC);
//   var_dump($affiches);
}
 
 if(!empty($_GET['id'])){
     $id_categorie=$_GET['id'];
     $selectLivre="SELECT * FROM livres WHERE id_categorie='$id_categorie'";
     $requet1=mysqli_query($connexion,$selectLivre);
     if($requet1){
        
         $livres =mysqli_fetch_all($requet1,MYSQLI_ASSOC );

        //  var_dump($livres);
     }

     $selecategorie="SELECT * FROM categorie WHERE id='$id_categorie'";
     $requet2=mysqli_query($connexion,$selecategorie);
     if($requet2){
        
         $categorie =mysqli_fetch_all($requet2,MYSQLI_ASSOC );

        //  var_dump($categorie);
     }
   
 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categorie</title>
    <link type="text/css" rel="stylesheet" href="./css/categorie.css">
</head>
<body>
    <nav class="nav">
        <div class="onglets">
           <p class="logo"><img src="./image/Capture_d_écran_2023-10-05_à_14.35.01-removebg-preview.png" width="50px" alt=""></p>
           <input type="checkbox" id="barre">
           <label for="barre">Menu</label>
           <div class="droit">
               <ul>
                   <li> <a href="./index.php">Accueil</a></li>
                   <li><a href="">Contact</a></li>
                   <li><a href="">Categorie+</a>
                        <ul>
                        <?php foreach($affiches as $value) :?>
                        <li><a href="./categories.php?id=<?php echo $value['id'] ;?>"><?php echo $value['type'];?></a></li>
                        
                        <?php endforeach;?>
                        </ul>

                      </li>

                  </ul>
              </div>
         </div>
          <div class="gauche">
              <input type="search" placeholder="recherhce.."> 
            <ul>
             <li><?php echo "Salue".' ' .$recup['nom'];?></li>
              <li><a href="./profile.php">Profile</a></li>
              <li><a href="../php/panier.php"><img src="../image/panier.png" alt=""></a></li>
              <!-- <a href="./php/connexion.php"> Profile<img src="../image/user.png" alt=""></a>
              <a href="./panier.php"><img src="../image/panier.png" alt=""></a> -->
            </ul>
          </div>
      </nav>
  <!--fin barre de navigation  -->
<!-- categories -->
<section class="section3">
    
    <div class="populaire">
        <?php foreach ($categorie as $value):?>
        <h2><?php echo $value['type'];?></h2>
        <?php endforeach;?>
        <div class="livres">
         <?php foreach ($livres as $value):?>
            <div class="livre">
                 <img src="<?php echo $value['image'];?>" alt="">
                 <p><?php echo $value['nom'];?></p>
                  <p><?php echo $value['prix'];?></p>
                <button type="submit"><a href="./voir.php?id=<?php echo $value['id'];?>">voir le produit</a></button>
            </div>
            <?php endforeach;?>
           
    </div>
 </section>
 <!-- fin de la section3 -->

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