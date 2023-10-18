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
               <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>l'alchimiste</td>
              <td><img src="../image/bien-être-compressor.jpeg" alt="vjkcfjnv" width="150px"></td>
              <td>20522</td>
              <td>parru le 05</td>
              <td>200px</td>
              <td>jnk,nk</td>
              <td>maison</td>
              <td>
                <div class="action">
                  <a href="" style="margin-right:10px ;">Editer</a>
                  <a href="">Suprimer</a>
                </div>
              </td>
            </tr>
          </tbody>
         </table>
      </div>
    </section>
  
</body>
</html>