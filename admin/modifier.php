<?php

session_start();
$connexion=mysqli_connect ('localhost','root', '','librairie');
 if(!$connexion){
  die('erreur de connexion');
 }

 if(!empty($_SESSION['admin_id'])){
   $sessionAdmin = $_SESSION['admin_id'];

   $select="SELECT * FROM admin WHERE id = '$sessionAdmin'";
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

 //recuperation des categories
  $categorie="SELECT *FROM categorie";
  $query=mysqli_query($connexion,$categorie);

 if($query){

    $recuperation=mysqli_fetch_all($query,MYSQLI_ASSOC);
   //  var_dump($recuperation);
 }
 
//  echo"hjbklhjk";
 if(!empty($_GET['id-modifier'])){
  $id_modifier=$_GET['id-modifier'];
 $selection="SELECT *FROM livres WHERE id ='$id_modifier' ";
 $requete=mysqli_query($connexion,$selection);
  if($requete){
    $article=mysqli_fetch_assoc($requete);
    // var_dump($article);
    if(!$requete){
      header("LOCATION:./modifier.php");
    }
  }else{
    echo"poups une erreur c'est produit";
  }

  if(!empty($_POST['livre'])&& !empty($_POST['prix']) && !empty($_POST['img-url']) && !empty($_POST['apparution']) && !empty($_POST['nbpage']) && !empty($_POST['description']) && !empty($_POST['categorie']) && !empty($_POST['nom_auteur'])&& !empty($_POST['biographie_auteur'])){
   
    $livre=$_POST['livre'];
    $prix=$_POST['prix'];
    $img_url=$_POST['img-url'];
    $apparution=$_POST['apparution'];
    $nbpage=$_POST['nbpage'];
    $description=$_POST['description'];
    $categorie=$_POST['categorie'];
    $nom_auteur=$_POST['nom_auteur'];
    $biographie_auteur=$_POST['biographie_auteur'];
    // $id_admin = $sessionAdmin;

    $modifier="UPDATE livres SET nom= '$livre' , prix= '$prix',image= '$img_url' , date_parution= '$apparution', nombre_page=' $nbpage' , resume=' $description', id_categorie='$categorie', nom_auteur='$nom_auteur',biograthie_auteur=' $biographie_auteur'" ;
    $requete2=mysqli_query($connexion,$modifier);

    if($requete2){
      $selection="INSERT * FROM livres WHERE id='$id_modifier'";
      $requete=mysqli_query($connexion,$selection);
      $article=mysqli_fetch_assoc($requete);
      echo "modification validé";
    }else{
      echo"erreur";
      // die(mysqli_stmt_error($article));
    }
  }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link type="text/css" rel="stylesheet" href="./css/article.css">
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
                   <li><a href="./article.php">tableau-bord</a></li>
                   <!-- <li><a href="">Categorie+</a>
                        <ul>
                           <li><a href="">lorem</a></li>
                           <li><a href="">lorem</a></li>
                           <li><a href="">lorem</a></li>
                           <li><a href="">lorem</a></li>
                           <li><a href="">lorem</a></li>
                        </ul>
  
                      </li> -->
  
                  </ul>
              </div>
         </div>
          <div class="gauche">
             <!-- <input type="search" placeholder="recherhce.."> -->
            <!-- <ul>
              <a href="../php/connexion.php"><img src="./image/user.png" alt=""></a>
             <a href=""><img src="./image/panier.png" alt=""></a>
            </ul> -->
          </div>
      </nav>
  <!--fin barre de navigation  -->

  <section class="section2">
    <div>
      <!-- <h1>Bienvenue sur votre espace administateur</h1> -->
    </div>

   <div class="livres">
     <form action="" method="post">
        <h3>Ajouter un nouveaux livre </h3>
       <div class="group">
         <label for="">Nom du livre</label>
         <input type="text" name="livre" id=" livre" placeholder="livre" value="<?php echo $article['nom'];?>">
       </div>
        
       <div class="group">
         <label for="">Prix</label>
         <input type="text" name="prix" id="prix" value="<?php echo $article['prix'];?>">
       </div>

       <div  class="group">
         <label for="url">image</label>
         <input type="url" name="img-url" id="img-url"  value="<?php echo $article['image'];?>">
       </div>

       <div  class="group">
         <label for="">Date d'apparution</label>
         <input type="text" name="apparution" id="apparution"  value="<?php echo $article['date_parution'];?>">
       </div>

       <div  class="group">
         <label for="">Nombre de page</label>
         <input type="text" name="nbpage" id="nbpage"  value="<?php echo $article['nombre_page'];?>" >
       </div>
       <div  class="group">
         <label for="">Description</label>
         <textarea name="description" id="description" cols="50" rows="10"><?php echo $article['resume'];?></textarea>
       </div>
       <div  class="group">
         
         <select name="categorie" id="categorie">
           <?php foreach ($recuperation as $value):?>
            <option value="<?php echo $value['id'];?> "><?php echo $value['type'];?> </option>
            <?php endforeach;?>
         </select>
         
        </div>
        <div  class="group">
         <label for="">Nom de l'auteur</label>
         <input type="text" name="nom_auteur" id="nom_auteur" value="<?php echo $article['nom_auteur'];?>" >
       </div>

       <div  class="group">
         <label for="">Biographie de l'auteur</label>
         <textarea name="biographie_auteur" id="biographie_auteur" cols="50" rows="10"><?php echo $article['biograthie_auteur'];?></textarea>
       </div>
         
        <input type="submit" id=" enregistrer" value="Modifier">
     
      </form>
   </div>
    
  </section>


     
  
</body>
</html>