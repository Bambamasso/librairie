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
         <label for="">nom</label>
         <input type="text" name="livre" id=" livre" placeholder="livre">
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
            <option value="">Croissance personnel</option>
            <option value=""> Psychologieet comportement humain</option>
            <option value="">Motivation-Inspiration</option>
            <option value="">Confience en soi</option>
         </select>
         
        </div>
      
        <input type="submit" id=" enregistrer" value="enregistrer">
     
      </form>
   </div>
    
  </section>


     
  
</body>
</html>