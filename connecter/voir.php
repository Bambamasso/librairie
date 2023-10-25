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
  // // var_dump($affiches);
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
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="./css/voir.css">
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
                        <li><a href="./categories.php?id=<?php echo $value['id']; ?>"><?php echo $value['type'];?></a></li>
                        
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
              <li><a href="./panier.php"><img src="../image/panier.png" alt=""><span class="number"><?php echo $nb_panier ?? 0; ?></span></a></li>
              <!-- <a href="./php/connexion.php"> Profile<img src="../image/user.png" alt=""></a>
              <a href="./panier.php"><img src="../image/panier.png" alt=""></a> -->
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
             <p class="auteur"><?php echo $value['nom_auteur'];?> <span>(Auteur)</span></p>
             <p class="page"> <?php echo $value['nombre_page'];?>, <?php echo $value['date_parution'];?></p>
             <div class="prix">
              <p>Prix:<?php echo $value['prix'];?>fcfa</p>
             </div>
             <div class="button"><a href="./ajout-panier.php?id_livres=<?php echo $value['id']; ?>" style="text-decoration: none; color: white;">Ajouter au panier<a></div>
          </div>
          <div class="graph">
            <h2 class="nom"><?php echo $value['nom_auteur'];?> <span>(Auteur)</span></h2>
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
             <h2>Resumé</h2>
             <p><?php echo $value['resume'];?></p>
         </div>
         <?php endforeach;?>
      </div>
  </section>
</body>
</html>