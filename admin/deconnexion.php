<?php 
session_start();
$connexion = mysqli_connect ('localhost', 'root','', 'librairie' );
if(!$connexion){
    die('Erreur de connexion à la Base de Donnée');
     }
echo $_SESSION['admin_id'];

if(!empty($_SESSION['admin_id'])){
$sessionAdmin = $_SESSION['admin_id'];
$selection="SELECT * FROM admin WHERE id='$sessionAdmin' ";

 $query=mysqli_query ($connexion,$selection);

 $recuperation=mysqli_fetch_assoc($query);
 if($recuperation){
    unset($_SESSION['admin_id']);
    header ('LOCATION:../php/connexion.php');
    // var_dump($recuperation);
 }else{
    die("utilisateur inconnu");
 }
}else{
    header('LOCATION:../../connexion.php');
}

?>