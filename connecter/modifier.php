<?php  session_start();
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


  if(!empty($_GET['livre_id']) && !empty($_GET['qte'])){
    $livre_id = (int) $_GET['livre_id']; # Conversion en int
    $qte = (int) $_GET['qte']; # Conversion en int

    # Si la conversion ne retourne pas de valeur on le ramène à l'accueil
    if(!$livre_id or !$qte){
        // echo"erreur";
        //  header('LOCATION: ./panier.php');
    }

     if($qte<1){
        // //  header('LOCATION: ./panier.php');
     }else{
         # On récupère le panier en fonction de l'id
         $sql = "SELECT * FROM panier WHERE livres_id = ?"  ;
         $stmt = mysqli_prepare($connexion, $sql); # On prépare la requête (évite les injections SQL)
         $query = mysqli_stmt_bind_param($stmt, "i", $livre_id, );
         mysqli_stmt_execute($stmt);
         $result = mysqli_stmt_get_result($stmt);
         if($result){
             # On récupère les données de la requête
             $panier = mysqli_fetch_assoc($result,);
            var_dump($panier);

             if(!$panier){
                 header('LOCATION: ./panier.php');
             }

             # Si le panier existe, on incrémente la quantité
             $sql = "UPDATE panier SET quantite =? WHERE id=? AND user_id=?";
             $stmt = mysqli_prepare($connexion, $sql);
             $query = mysqli_stmt_bind_param($stmt, "iii", $qte, $panier['id'],$sessionUserId);
             mysqli_stmt_execute($stmt);
         

             # Si l'ajout se passe bien on affiche un message de succès
             if(mysqli_affected_rows($connexion)>0){
                 echo "bien";
                 header('LOCATION: ./panier.php');
            }else{
                 # Sinon on le ramène au panier
            
                //  header('LOCATION: ./panier.php');
             }
         }else{
            //  header('LOCATION: ./panier.php');
         }
     }

 }else{
    # Sinon on le ramène au panier
    //  header('LOCATION: ./panier.php');
}

  ?>