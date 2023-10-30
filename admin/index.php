 <?php
  session_start();
  
  require_once('../config.php');
 
   if(!empty($_SESSION['admin_id'])){
     $sessionAdmin = $_SESSION['admin_id'];
 
     $select="SELECT * FROM admin WHERE id = '$sessionAdmin'";
     $requet=mysqli_query($connexion,$select);
     $recup=mysqli_fetch_assoc($requet);
    

     if($recup){
         // var_dump($recup);

       $affiche="SELECT* FROM livres WHERE id_admin=$sessionAdmin";
       $query=mysqli_query($connexion,$affiche);

       if($query){
       $adminLivre=mysqli_fetch_all($query,MYSQLI_ASSOC);
      //  var_dump($adminLivre);

       }

     }else{
         die("utilisateur inconnu");
     }
 
   }else{
     header('LOCATION:../php/connexion.php');
   }
 ?>
 
 <?php?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link type="text/css" rel="stylesheet" href="../admin/css/espace-admin.css">
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
                    <li><a href="./article.php">tableau-bord</a></li>
                    <li><a href="./deconnexion.php">Deconnexion</a></li>
                  
  
                  </ul>
              </div>
         </div>
          <div class="gauche">
          
          </div>
      </nav>
  <!--fin barre de navigation  -->

  <section class="section1">
    <div>
       <h1>Bienvenue sur votre espace administateur</h1> 
    </div>

  </section>

    <section class="section2">
      <div class="poste">
         <table>
          <thead>
            <tr>
               <th>Nom</th>
               <th>Image</th>
               <th>Prix</th>
               <th>Date d'apparution</th>
               <th>Nbpages</th>
               <th>Description</th>
               <th>Categorie</th>
               <th>Nom auteur</th>
               <th>Biographie de l'auteur</th>
               <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($adminLivre as $value):?>
            <tr>
              <td><?php echo $value['nom'];?></td>
              <td><img src="<?php echo $value['image'];?>" alt="vjkcfjnv" width="150px"></td>
              <td><?php echo $value['prix'];?></td>
              <td><?php echo $value['date_parution'];?></td>
              <td><?php echo $value['nombre_page'];?></td>
              <td><?php echo $value['resume'];?></td>
              <td><?php echo $value['id_categorie'];?></td>
              <td><?php echo $value['nom_auteur'];?></td>
              <td><?php echo $value['biograthie_auteur'];?></td>
              <td>
                <div class="action">
                  <a href="./modifier.php?id-modifier=<?php echo $value['id'];?>">Editer</a>
                  <a href="./suprimer.php?id-livres=<?php echo $value['id'];?>">Suprimer</a>
                </div>
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
         </table>
      </div>
    </section>
  
</body>
</html>