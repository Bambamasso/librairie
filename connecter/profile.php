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
    //  var_dump($recup);
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
    <title>profile</title>
    <link type="text/css" rel="stylesheet" href="./css/profile.css">
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
            <!-- <input type="search" placeholder="recherhce.."> -->
            <ul>
                <li></li>
                <li> Salue <a href="./profile.php"><?php echo  $recup['nom'];?></a></li>
                <li> <a href="./panier.php"><img src="../image/panier.png" alt=""><span class="number"><?php echo $nb_panier ?? 0; ?></span></a></li>
            </ul>
        </div>
    </nav>
<!--fin barre de navigation  -->

   <main>
     <div class="profile">
            <h3>Profile</h3>
          <div class="info">
                <h4>Mes information</h4>
                <div>
                    <img src="" alt="">
                </div>
                <div>
                    <p class="p">Nom</p>
                    <p><?php echo $recup['nom'];?></p>
                </div>
                <div>
                    <p class="p">prenom</p>
                    <p><?php echo $recup['Prenom'];?></p>
                </div>
                <div>
                    <p class="p">Email</p>
                    <p><?php echo $recup['email'];?></p>
                </div>
              
          </div>
          <button><a href="./deconexion.php">Deconnexion</a></button>
            <form action="" method="post">
                <h4>Modifier mes informations</h4>
                
                <div class="group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="email">
                </div>

                <div class="group">
                    <label for="">Mote de passe</label>
                    <input type="password" name="motDePasse" class="motDePasse">
                </div>

                <div class="group">
                    <label for="">Confirmer mot de passe</label>
                    <input type="password" name="confirmation" class="confirmation">
                </div>
                <input type="submit" value="Enregistrer">
            </form>
          </div>
      </div>

   </main> 
</body>
</html>