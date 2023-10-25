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

  $selection="SELECT *FROM categorie ";
$execute=mysqli_query($connexion,$selection);
if($execute){
  // echo "selection validé";
  $affiches=mysqli_fetch_all($execute,MYSQLI_ASSOC);
//   var_dump($affiches);
}
   
  # Selection de tous les paniers dans la bd
// $sql = "SELECT * FROM panier INNER JOIN livres WHERE livres.id = panier.livres_id AND INNER JOIN users WHERE users.id = panier.user_id ";
$sql ="SELECT * FROM panier INNER JOIN livres WHERE livres.id = panier.livres_id AND panier.user_id = '$sessionUserId'";
;
$query = mysqli_query($connexion, $sql);
if ($query) {
    $paniers = mysqli_fetch_all($query, MYSQLI_ASSOC);
    // var_dump($paniers);
} else {
    echo "<script>Une erreur est survenue lors de la récupération des données</script>";
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
    <script defer src="https://kit.fontawesome.com/1f88d87af5.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="./css/panier.css">
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
                <li><?php echo "Salue".' ' .$recup['nom'];?></li>
                <li> <a href="./profile.php">Profile</a></li>
                <li> <a href="./panier.php"><img src="../image/panier.png" alt=""><span class="number"><?php echo $nb_panier ?? 0; ?></span></a></li>
              <!-- <a href="./connexion.php"> Profile</a>
             <a href="./panier.php"><img src="../image/panier.png" alt=""></a> -->
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
                         <th>Prix total</th>
                         <th>Action</th>
                      </tr>
                   </thead>
                   <tbody>
                    <?php if(!empty($paniers)) :?>
                      <?php $total = 0; ?> 
                      <?php foreach ($paniers as $value):?>
                        <?php $total += $value['prix'] * $value['quantite']; ?> 
                      <tr>
                        <td class="article" style="display: flex; align-items: center;">
                            <img src="<?php echo $value['image']; ?>" alt="" width="80px">
                            <span><?php echo $value['nom']; ?></span>
                        </td>
                        <td><input type="number" value="<?php echo $value['quantite'];  ?>" id="livre<?php echo $value['id']; ?>" min="1"></td>
                        <td>Prix : <?php echo number_format($value['prix'], 2, '.'); ?>fcfa</td>
                        <td><?php echo number_format(($value['prix'] * $value['quantite']), 2, '.'); ?> fcfa</p></td>
                        <td><i class="fas fa-check" style="color: blue; margin: 0.5em;" onclick="updateCart(event, <?php echo $value['id']; ?>)"></i><i class="fas fa-trash" style="color: red; margin: 0.5em;" onclick="deleteCart(event, <?php echo $value['id']; ?>)"></i></td>
                       <!-- <td><a>suprimer</a></td> -->

                      </tr>
                        <?php endforeach;?>
                       <?php else:?>
                        <tr>
                           <td colspan="6">Aucun article dans le panier</td>
                        </tr>
                    <?php endif;?>    
                   </tbody>
                </table>

                <div class="validation">
                  <h1>Recapitulatif</h1>
                 <!-- <?php if (!empty($paniers)) : ?> -->
                
                 
                  <div class="prixTotal">
                    <p style="font-size: 20px;">Total panier :</p>
                    <p><?php echo $nb_panier ?? 0; ?>  produits</p> 
                  </div>
                

                  <div class="prixTotal">
                    <p style="font-size: 20px;" >Total: </p>
                    <p><?php echo number_format($total, 2, '.'); ?>fcfa</p>
                  </div>
                  <div class="command">
                     <a href="">Commander</a>
                  </div>
                  <?php else : ?>
                    <p>aucune facture</p>
                  <?php endif; ?>
                </div>
               
            </div>
       </div>
  </section>

   <!-- debut du footer -->
 
</body>
<script>
    document.addEventListener('scroll', () => {
        if (window.scrollY >= 10) {
            document.querySelector('#header').classList.add('sticky')
        } else {
            document.querySelector('#header').classList.remove('sticky')
        }
    })

    function updateCart(event, livreId) {
        event.preventDefault(); // Empêche le comportement par défaut du lien

        // Récupère la valeur de l'élément <input> en utilisant l'identifiant unique
        var inputElement = document.getElementById("livre" + livreId);
        var quantite = inputElement.value;

        let url = "./modifier.php?livre_id=" + livreId + "&qte=" + quantite;
        window.location.href = url;
    }

    function deleteCart(event, livreId) {
        event.preventDefault(); // Empêche le comportement par défaut du lien

        // Récupère la valeur de l'élément <input> en utilisant l'identifiant unique
        var inputElement = document.getElementById("livre" + livreId);

        if (confirm('Voulez vous réellement supprimer cet livre du panier?')) {
            let url = "./suprimer.php?livre_id=" + livreId;
            window.location.href = url;
        }

    }
</script>


</html>