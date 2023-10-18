<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link type="text/css" rel="stylesheet" href="./css/acceuil.css">
</head>
<body>
    <nav class="nav">
      <div class="onglets">
         <p class="logo"><img src="./image/Capture_d_écran_2023-10-05_à_14.35.01-removebg-preview.png" width="50px" alt=""></p>
         <input type="checkbox" id="barre">
         <label for="barre">Menu</label>
         <div class="droit">
             <ul>
                 <li> <a href="">Accueil</a></li>
                 <li><a href="">Contact</a></li>
                 <li><a href="">Categorie+</a>
                      <ul>
                         <li><a href="./php/categorie-croissance.php">Croissance personnel</a></li>
                         <li><a href="./php/categorie-humain.php">Psychologie et comportement humain</a></li>
                         <li><a href="./php/categorie-motivation.php">Motivation-Inspiration</a></li>
                         <li><a href="./php/categorie-confiance.php">Confience en soi</a></li>
                         <!-- <li><a href="">lorem</a></li> -->
                      </ul>

                    </li>

                </ul>
            </div>
       </div>
        <div class="gauche">
           <input type="search" placeholder="recherhce..">
          <ul>
            <a href="./php/connexion.php"><img src="./image/user.png" alt=""></a>
           <a href="./php/panier.php"><img src="./image/panier.png" alt=""></a>
          </ul>
        </div>
    </nav>
<!--fin barre de navigation  -->

<!--debut du corps de la page  -->
<section class="section1">
  <div class="header">
     <div class="lesp"> 
         <p class="p1">Apprendre à gérer ses émotions, trontrolé ses sentiment
            grace à la magie de la lecture.</p>
         <p class="p2">Laissez-vous guider par nos ouvrages sur le développement personnel.Ils vous apprennent la vie ou vous nourrissent intellectuellement dans le but de cultiver votre bien-être. </p>
     </div>
  </div>
</section>
<!-- fin de la section1 -->

<!-- debut de la section2 -->
<section class="section2">
  <div class="categories">
     <h2>Explorer par Catégorie</h2>
     <div class="articles">
         <div class="article">
             <img src="./image/livre croissance personnellle.jpeg" alt="">
             <p><a href="">Croissance personnel</a></p>
          </div>

          <div class="article">
             <img src="./image/les_lois_de_la_nature_humaines-5008931-264-432.jpeg" alt="">
             <p><a href="">Psychologie et Comportement humain</a></p>
          </div>

          <div class="article">
             <img src="./image/corps-n-oublie-rien.jpeg" alt="">
             <p><a href="">Santé et bien-être</a></p>
         </div>

         <div class="article">
             <img src="./image/le_manifeste_de_la_motivation-1250691-264-432.jpeg" alt="">
             <p><a href="">Motivation-Inspiration</a></p>
         </div>

         <div class="article">
             <img src="./image/developement des competeces.png" alt="">
             <p><a href="">Développement des competence</a></p>
         </div>

         <div class="article">
             <img src="./image/livres-apprendre-a-avoir-confiance-en-soi.webp" alt="">
             <p><a href="">Confience en soi</a></p>
         </div>
        </div>

    </div>
</section>
 <!-- fin de la section 2 -->
 
 <!-- debut section 3 -->
  <section class="section3">
    
    <div class="populaire">
        <h2>Les livre de développement personnel les plus populaire</h2>
        <div class="livres">
            <div class="livre">
                 <img src="" alt="">
                 <p>Lorem</p>
                  <p>Prix</p>
                <button type="submit"><a href="./php/voir.php">voir le produit</a></button>
            </div>

            <div class="livre">
                <img src="" alt="">
                <p>Lorem</p>
                <p>Prix</p>
                <button type="submit"><a href="./php/voir.php">voir le produit</a></button>
            </div>

            <div class="livre">
                <img src="" alt="">
                <p>Lorem</p>
                <p>Prix</p>
                <button type="submit"><a href="./php/voir.php">Voir le produit</a></button>
            </div>

            <div class="livre">
                <img src="" alt="">
                <p>Lorem</p>
                <p>Prix</p>
                <button type="submit"><a href="./php/voir.php">Voir le produit</a></button>
            </div>

            <div class="livre">
                <img src="" alt="">
                <p>Lorem</p>
                <p>Prix</p>
                <button type="submit"><a href="./php/voir.php">Voir le produit</a></button>
            </div>

            <div class="livre">
                <img src="" alt="">
                <p>Lorem</p>
                <p>Prix</p>
                <button type="submit"><a href="./php/voir.php">Voir de produit</a></button>
            </div>
        </div>
    </div>
 </section>
 <!-- fin de la section3 -->

 <!-- debut du footer -->
 <footer>
    <div class="info">
        <div class="livraison">
          <img src="./image/fast-delivery.png" alt="7542154"  width="50px" >
          <p>Livraison sous 24h/48h</p>
         
        </div>
        <div class="livraison">
          <img src="./image/atm.png" alt="7542154" width="50px">
          <p>Retrait gratuit en librairie</p>
        </div>
        <div class="livraison">
         <img src="./image/credit-card.png" alt="7542154"  width="50px">
          <p>Paiement securisé</p>
        </div>
        <div class="livraison">
            <img src="./image/24-hours-support.png" alt="7542154" width="50px" >
            <p>Service client de 9h à 17h</p>
        </div>
    </div>
    <div class="adresse">
        <div class="navigation">
            <h3>Suivez-nous sur:</h3>
            <div class="reseaux">
                <div class="img"><img src="./image/facebook.png" alt=""></div>
                <div  class="img"><img src="./image/instagram.png" alt=""></div>
                <div  class="img"><img src="./image/tiktok.png" alt=""></div>
                <div  class="img"><img src="./image/twitter.png" alt=""></div>
            </div>
       </div>
       <div class="navigation">
        <h3>Navigation</h3>
           <ul>
            <li>Acceuil</li>
            <li>Contact</li>
            <li>Catégories</li>
           </ul>
       </div>
       <div class="navigation">
        <h3>Categorie</h3>
        <ul>
            <li>Croissance personnel</li>
            <li>Psychologie et Comprtement humain</li>
            <li>Santé et bien-être</li>
            <li>Motivation-Inspiration</li>
            <li>Dévelppement Competence</li>
            <li>Confience en soi</li>
           </ul>
       </div>
    </div>
</footer>
</body>
</html>