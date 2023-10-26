<?php
$connexion=mysqli_connect ('localhost','root', '','librairie');
if(!$connexion){
 die('erreur de connexion');
}

$selection="SELECT *FROM categorie ";
$execute=mysqli_query($connexion,$selection);
if($execute){
  // echo "selection validé";
  $affiches=mysqli_fetch_all($execute,MYSQLI_ASSOC);
//   var_dump($affiches);
}
if(!empty($_GET['id'])){
  $id_livre=$_GET['id'];
  $selectLivre="SELECT * FROM livres WHERE id='$id_livre'";
  $livre=mysqli_query($connexion,$selectLivre);
  if($livre){
     
      $livre =mysqli_fetch_all($livre,MYSQLI_ASSOC );
      // var_dump($livre);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="../css/voir.css">
</head>
<body>
    <nav class="nav">
        <div class="onglets">
           <p class="logo"><img src="../image/Capture_d_écran_2023-10-05_à_14.35.01-removebg-preview.png" width="50px" alt=""></p>
           <input type="checkbox" id="barre">
           <label for="barre">Menu</label>
           <div class="droit">
               <ul>
                   <li> <a href="../index.php">Accueil</a></li>
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
              <!-- <input type="search" placeholder="recherhce..">  -->
            <ul>
              <a href="./connexion.php"><img src="../image/user.png" alt=""></a>
              <a href="./panier.php"><img src="../image/panier.png" alt=""></a>
            </ul>
          </div>
      </nav>
  <!--fin barre de navigation  -->
  <!-- debut section 1 -->
  <section class="section1">
      <div class="achat">
       <?php foreach ($livre as $value):?>
         <div class="livre">
             <img src="<?php echo $value['image'];?>" alt="nkvbn">
         </div>

          <div class="info">
             <p class="nom"><?php echo $value['nom'];?></p>
             <p class="auteur" ><?php echo $value['nom_auteur'];?> <span>(Auteur)</span></p>
             <p class="page"> <?php echo $value['nombre_page'];?>, <?php echo $value['date_parution'];?></p>
             <div class="prix">
             <p style="color:#2605CC;">Prix: <?php echo $value['prix']."fcfa";?></p>
             </div>
             <div class="button"><a href="./connexion.php" style="text-decoration: none; color: #010c37;">Ajouter au panier<a></div>
          </div>
          <div class="graph">
            <h2 class="nom"  style="margin-bottom:10px;"><?php echo $value['nom_auteur'];?> <span>(Auteur)</span></h2>
            <p><?php echo $value['biograthie_auteur'];?></p>
        </div>
        <?php endforeach;?>
      </div>
  </section>
<!-- fin de la section1 -->
<!-- debut section2 -->
  <section class="resumé">
      <div class="resum">
      <?php foreach($livre as $value):?>
         <div class="extrait">
             <h2 style="margin-bottom:10px;">Resumé</h2>
             <p><?php echo $value['resume'];?></p>
         </div>
         <?php endforeach;?>
      </div>
  </section>

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
          <div><img src="../image/telephone-handle-silhouette (1).png" alt="n"></div>
          <div><p>+2250102431214</p></div>
        </div>
        <div class="adresse">
          <div><img src="../image/email (1).png" alt="n"></div>
          <div><p>bambamasso51gmail.com</p></div>
        </div>
        <div class="adresse">
          <div><img src="../image/maps-and-flags.png" alt="n" width="30px"></div>
          <div><p>Abidjan, Abobo biabou</p></div>
        </div>
      </div>
   </div>
</footer>
</body>
</html>