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

  if(!empty($_POST['livre'])&& !empty($_POST['prix']) && !empty($_POST['img-url']) && !empty($_POST['apparution']) && !empty($_POST['nbpage']) && !empty($_POST['description']) && !empty($_POST['categorie']) && !empty($_POST['nom_auteur'])&& !empty($_POST['biographie_auteur'])){
   
    $livre=strip_tags($_POST['livre']);
    $prix=$_POST['prix'];
    $img_url=$_POST['img-url'];
    $apparution=$_POST['apparution'];
    $nbpage=$_POST['nbpage'];
    $description=$_POST['description'];
    $categorie=$_POST['categorie'];
    $nom_auteur=$_POST['nom_auteur'];
    $biographie_auteur=$_POST['biographie_auteur'];
    $id_admin = $sessionAdmin;

    $insertion="INSERT INTO livres(id_admin, nom, prix, image, date_parution, nombre_page, resume, id_categorie , nom_auteur,	biograthie_auteur)";
   $insertion.=" VALUES(?,?,?,?,?,?,?,?,?,?)";
   $preparation=mysqli_prepare($connexion,$insertion);
   $affectation=mysqli_stmt_bind_param($preparation,"isssssssss",$id_admin, $livre,$prix,$img_url,$apparution,$nbpage,$description,$categorie,$nom_auteur,$biographie_auteur);
   mysqli_stmt_execute($preparation);

   if(mysqli_affected_rows($connexion)>0){
    // echo "insertion validé";
    header('LOCATION:index.php');
   }else{
    die(mysqli_stmt_error($preparation));
   }
  }
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link type="text/css" rel="stylesheet" href="../admin/css/article.css">
</head>
<body>
    <nav class="nav">
        <div class="onglets">
           <p class="logo"><img src="../image/Capture_d_écran_2023-10-05_à_14.35.01-removebg-preview.png" width="100px" alt=""></p>
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
         <input type="text" name="livre" id=" livre" placeholder="">
       </div>
        
       <div class="group">
         <label for="">Prix</label>
         <input type="text" name="prix" id="prix">
       </div>

       <div  class="group">
         <label for="url">image</label>
         <input type="url" name="img-url" id="img-url">
       </div>

       <div  class="group">
         <label for="">Date d'apparution</label>
         <input type="text" name="apparution" id="apparution">
       </div>

       <div  class="group">
         <label for="">Nombre de page</label>
         <input type="text" name="nbpage" id="nbpage" >
       </div>
       <div  class="group">
         <label for="">Description</label>
         <textarea name="description" id="description" cols="50" rows="10"></textarea>
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
         <input type="text" name="nom_auteur" id="nom_auteur" >
       </div>

       <div  class="group">
         <label for="">Biographie de l'auteur</label>
         <textarea name="biographie_auteur" id="biographie_auteur" cols="50" rows="10"></textarea>
       </div>
         
        <input type="submit" id=" enregistrer" value="enregistrer">
     
      </form>
   </div>
    
  </section>


     
  
</body>
</html>