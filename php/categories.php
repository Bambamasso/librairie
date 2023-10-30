<?php
 require_once('../config.php');

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
    <title>categoreis</title>
    <link type="text/css" rel="stylesheet" href="../css/categorie.css">
</head>
<body>
<nav class="nav">
      <div class="onglets">
      <p class="logo"  style="color:#010c37;font-size:30px;color:white;margin-left:20px;">BmLibrairie</p>
         <input type="checkbox" id="barre">
         <label for="barre">Menu</label>
         <div class="droit">
             <ul>
                 <li> <a href="../index.php">Accueil</a></li>
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
        <div class="gauche">
           <input type="search" placeholder="recherhce..">
          <ul>
            <li><a href="./connexion.php"><img src="../image/user.png" alt=""></a></li>
            <li> <a href="./connexion.php"><img src="../image/panier.png" alt=""></a></li>
          </ul>
        </div>
    </nav>
<!--fin barre de navigation  -->
<section class="section3">
    
    <div class="populaire">
        <?php foreach ($categorie as $value):?>
        <h2><?php echo $value['type'];?></h2>
        <?php endforeach;?>
        <div class="livres">
         <?php foreach ($livres as $value):?>
            <div class="livre">
                 <img src="<?php echo $value['image'];?>" alt="">
                 <p style="color:#010c37;"><?php echo $value['nom'];?></p>
                  <p style="color:#2605CC;"><?php echo $value['prix']."fcfa";?></p>
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