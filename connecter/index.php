<?php
  session_start();
  require_once('../config.php');

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
      <p class="logo"  style="color:#010c37;font-size:30px;color:white;margin-left:20px;">BmLibrairie</p>
         <input type="checkbox" id="barre">
         <label for="barre">Menu</label>
         <div class="droit">
             <ul>
                 <li> <a href="./index.php">Accueil</a></li>
                 <!-- <li><a href="">Contact</a></li> -->
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
                <li></li>
                <li> Salue <a href="./profile.php"><?php echo $recup['nom'];?></a></li>
                <li> <a href="./panier.php"><img src="../image/panier.png" alt=""><span class="number"><?php echo $nb_panier ?? 0; ?></span></a></li>
            </ul>
        </div>
    </nav>
<!--fin barre de navigation  -->

<!--debut du corps de la page  -->
<section class="section1">
  <div class="header">
     <div class="lesp"> 
         <p class="p1">Apprendre à Gérer Ses Emotions, Trontrolé Ees Sentiment
            Grace à La Magie De La Lecture.</p>
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
                  <p  style="color:#2605CC;"><?php echo $value['prix']?>fcfa</p>
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