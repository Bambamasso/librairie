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
    //   var_dump($recup);
  }else{
      die("utilisateur inconnu");
  }

}else{
  header('LOCATION:../php/connexion.php');
}
if(!empty($_GET['id_livres'])){
    $id_livres = (int) $_GET['id_livres']; # Conversion en int
//   echo "bjkngkrb";
    # Si la conversion ne retourne pas de valeur on le ramène à l'accueil
    if(!$id_livres){
        header('Location: ./index.php');
    }


     # On récupère l'article en fonction de l'id
     $selctLivre = "SELECT * FROM livres WHERE id = ?";
     $prte = mysqli_prepare($connexion, $selctLivre); # On prépare la requête (évite les injections SQL)
     $query = mysqli_stmt_bind_param($prte, "i", $id_livres,); 
     mysqli_stmt_execute($prte);
     $result = mysqli_stmt_get_result($prte);
     if($result){
         # On récupère les données de la requête
         $livres = mysqli_fetch_assoc($result);
        //  var_dump($result);
         if(!$livres){
             header('Location: ./');
         }
        //  else{
        //     die(mysqli_stmt_error($result));
        //  }

        $selctLivre = "SELECT * FROM panier WHERE livres_id = ? AND user_id=?";
        $prte = mysqli_prepare($connexion, $selctLivre); # On prépare la requête (évite les injections SQL)
        $query = mysqli_stmt_bind_param($prte, "ii", $id_livres,  $sessionUserId ); 
        mysqli_stmt_execute($prte);
        $result = mysqli_stmt_get_result($prte);
        if($result){
            $panier = mysqli_fetch_assoc($result);
            // var_dump($result);


            if($panier){
                # Si le panier existe, on incrémente la quantité
                $selctLivre = "UPDATE panier SET quantite = quantite + 1 WHERE id=? AND user_id =?" ;
                $prte = mysqli_prepare($connexion, $selctLivre);
                $query = mysqli_stmt_bind_param($prte, "ii", $panier['id'], $sessionUserId );
                mysqli_stmt_execute($prte);

                # Si l'ajout se passe bien on affiche un message de succès
                if(mysqli_affected_rows($connexion)>0){
                    // echo'fbkjg';
                    header('Location: ./panier.php');
                }else{
                    # Sinon affiche une erreur
                    echo "Oops! Une erreur s'est produite lors de la modification des données... Veuillez réessayer plus tard";;
                    die();
                }
            }else{
                $quantite=1;
                $selctLivre = "INSERT INTO panier(livres_id, prix, quantite,user_id) VALUES(? ,? ,?, ?)";
                $prte = mysqli_prepare($connexion, $selctLivre);
                $query = mysqli_stmt_bind_param($prte, "idii", $id_livres, $livres['prix'],$quantite,$sessionUserId);
                mysqli_stmt_execute($prte);

              

                # Si l'ajout se passe bien on affiche un message de succès
                if(mysqli_affected_rows($connexion)>0){
                    header('Location: ./panier.php');
                }else{
                    # Sinon affiche une erreur
                    echo "Oops! Une erreur s'est produite lors de l'insertion des données... Veuillez réessayer plus tard";;
                    die(mysqli_stmt_error($prte));
                }
            }
        }

        }
}