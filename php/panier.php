<?php

$connexion=mysqli_connect ('localhost','root', '','librairie');

$selection="SELECT *FROM categorie ";
$execute=mysqli_query($connexion,$selection);
if($execute){
  // echo "selection validé";
  $affiches=mysqli_fetch_all($execute,MYSQLI_ASSOC);
//   var_dump($affiches);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link type="text/css" rel="stylesheet" href="../css/panier.css">
</head>
<body>
    <nav class="nav">
        <div class="onglets">
           <p class="logo"><img src="./image/Capture_d_écran_2023-10-05_à_14.35.01-removebg-preview.png" width="50px" alt=""></p>
           <input type="checkbox" id="barre">
           <label for="barre">Menu</label>
           <div class="droit">
               <ul>
                   <li> <a href="../inedx.php">Accueil</a></li>
                   <li><a href="">Contact</a></li>
                   <li><a href="">Categorie+</a>
                        <ul>
                        <?php foreach($affiches as $value) :?>
                            <li><a href="./categories.php?id=<?php echo $value['id'];?>"><?php echo $value['type'];?></a></li>
                            <?php endforeach;?>
                              <!-- <li><a href="">lorem</a></li> -->
                        </ul>

                      </li>

                  </ul>
              </div>
         </div>
          <div class="gauche">
             <input type="search" placeholder="recherhce..">
            <ul>
              <a href="./connexion.php"><img src="../image/user.png" alt=""></a>
             <a href="./panier.php"><img src="../image/panier.png" alt=""></a>
            </ul>
          </div>
      </nav>
  <!--fin barre de navigation  -->
  <!-- debut section1 -->
  <section class="section1">
       <div class="panier">
         <div class="table-panier">
             <h1>Mon panier</h1>

             <table>
                  <thead>
                      <tr>
                         <th>Produit</th>
                         <th>Quantité</th>
                         <th>Prix unitaire</th>
                         <th>Action</th>
                      </tr>
                   </thead>
                   <tbody>
                     <tr>
                          <td class="article" style="display: flex; align-items: center;">
                              <img src="../image/developement des competeces.png" alt="fvdhgj" width="80px">
                              <span>l'energie de la competense</span>
                          </td>
                          <td><input type="number"></td>
                          <td>Prix : ..fcfa</td>
                          <td><a href="">Suprimer</a></td>
                       </tr>
                   </tbody>
                </table>

                <div class="validation">
                     <h1>Recapitulatif</h1>
                     <div class="prixTotal">
                     <p style="font-size: 20px;">Total panier :</p>
                     <p>... produits</p>
                    </div>
                    <div class="prixTotal">
                        <p style="font-size: 20px;" >Total: </p>
                        <p>00fcfa</p>
                       </div>
                  <div class="command">
                     <a href="">Commander</a>
                  </div>
                </div>
               
            </div>
       </div>
  </section>

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