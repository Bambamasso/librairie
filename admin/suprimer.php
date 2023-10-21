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

if($_GET['id-livres']){
    $id_livres= $_GET['id-livres'];
    $rox = "DELETE  FROM livres WHERE id='$id_livres' ";
    $execute = mysqli_query($connexion,$rox);
    if($execute){
        echo "suppression actualisé";
        header('LOCATION:index.php');
    }else{
        echo "erreur ";
    }
}
?>