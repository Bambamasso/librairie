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
    // var_dump($affiches);
 }

 //selection de la table livre

   $selecte="SELECT* FROM livres LIMIT 4 ";
    $rqt=mysqli_query($connexion,$selecte);
    if($rqt){
        // echo "validé";
        $result=mysqli_fetch_all($rqt, MYSQLI_ASSOC);
        // var_dump($result);
    }
 
# Selection du nombre de paniers dans la bd
$nb_sql = "SELECT COUNT(*) AS total FROM panier WHERE user_id='$sessionUserId'";
$nb_query = mysqli_query($connexion, $nb_sql);
if ($nb_query) {
    $nb_panier = mysqli_fetch_assoc($nb_query);
    $nb_panier = $nb_panier['total'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link type="text/css" rel="stylesheet" href="./css/accueil.css">
</head>
<body>
    <nav class="nav">
      <div class="onglets">
         <p class="logo"><img src="../image/Capture_d_écran_2023-10-05_à_14.35.01-removebg-preview.png" width="50px" alt=""></p>
         <input type="checkbox" id="barre">
         <label for="barre">Menu</label>
         <div class="droit">
             <ul>
                 <li> <a href="./index.php">Accueil</a></li>
                 <li><a href="">Contact</a></li>
                 <li><a href="">Categorie+</a>
                      <ul>
                        <?php foreach($affiches as $value) :?>
                        <li><a href="./categories.php?id=<?php echo $value['id'];?>"><?php echo $value['type'];?></a></li>
                        
                        <?php endforeach;?>
                      </ul>

                    </li>

                </ul>
            </div>
       </div>
        <div class="gauche" >
            <input type="search" placeholder="recherhce..">
            <ul>
                <li><?php echo "Salue".' ' .$recup['nom'];?></li>
                <li> <a href="./profile.php">Profile</a></li>
                <li> <a href="./panier.php"><img src="../image/panier.png" alt=""><span class="number"><?php echo $nb_panier ?? 0; ?></span></a></li>
            </ul>
        </div>
    </nav>
<!--fin barre de navigation  -->

<!--debut du corps de la page  -->
<section class="section1">
  <div class="header">
     <div class="lesp"> 
         <p class="p1">Apprendre à gérer ses émotions, trontrolé ses sentiment
            grace à la magie de la lecture.</p>
         <p class="p2">Laissez-vous guider par nos ouvrages sur le développement personnel.Ils vous apprennent la vie ou vous nourrissent intellectuellement dans le but de cultiver votre bien-être. </p>
     </div>
  </div>
</section>
<!-- fin de la section1 -->

<!-- debut de la section2 -->
<section class="section2">
  <div class="categories">
     <h2>Explorer par Catégorie</h2>
     <div class="articles">
         <?php foreach ($affiches as $value) :?>
         <div class="article">
             <img src=" <?php echo $value['image'];?>" alt="">
             <p><a href="./categories.php?id=<?php echo $value['id'];?>"><?php echo $value['type'] ;?></a></p>
          </div>
          <?php endforeach ;?>
         
        </div>

    </div>
</section>
 <!-- fin de la section 2 -->
 
 <!-- debut section 3 -->
  <section class="section3">
    
    <div class="populaire">
        <h2>Les livre de développement personnel les plus populaire</h2>
        <div class="livres">
            <?php foreach($result as $value):?>
            <div class="livre">
                 <img src="<?php echo $value['image']?>" alt="">
                 <p><?php echo $value['nom']?></p>
                  <p><?php echo $value['prix']?>fcfa</p>
                <button type="submit"><a href="./voir.php?id=<?php echo $value['id']?>">voir le produit</a></button>
            </div>
            <?php endforeach;?>
           

            
        </div>
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