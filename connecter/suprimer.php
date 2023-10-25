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


  # Vérifie si les paramètres article_id existe
  if(!empty($_GET['livre_id'])){
    $livre_id = (int) $_GET['livre_id']; # Conversion en int

    # Si la conversion ne retourne pas de valeur on le ramène à l'accueil
    if(!$livre_id){
        header('Location: ./panier.php');
    }

    # On récupère le panier en fonction de l'id
    $sql = "SELECT * FROM panier WHERE livres_id = ? AND user_id=?";
    $stmt = mysqli_prepare($connexion, $sql); # On prépare la requête (évite les injections SQL)
    $query = mysqli_stmt_bind_param($stmt, "ii", $livre_id, $sessionUserId); 
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if($result){
        # On récupère les données de la requête
        $panier = mysqli_fetch_assoc($result);

        if(!$panier){
            header('Location: ./panier.php');
        }

        # Si le panier existe, on incrémente la quantité
        $sql = "DELETE FROM panier WHERE id=? AND user_id=?" ;
        $stmt = mysqli_prepare($connexion, $sql);
        $query = mysqli_stmt_bind_param($stmt, "ii", $panier['id'],$sessionUserId);
        mysqli_stmt_execute($stmt);

        # Si l'ajout se passe bien on affiche un message de succès
        if(mysqli_affected_rows($connexion)>0){
            header('Location: ./panier.php');
        }else{
            # Sinon on le ramène au panier
            header('Location: ./panier.php');
        }
    }else{
        header('Location: ./panier.php');
    }

}else{
    # Sinon on le ramène au panier
    header('Location: ./pannier.php');
}

?>