<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="../css/voir.css">
</head>
<body>
    <nav class="nav">
        <div class="onglets">
           <p class="logo"><img src="./image/Capture_d_écran_2023-10-05_à_14.35.01-removebg-preview.png" width="50px" alt=""></p>
           <input type="checkbox" id="barre">
           <label for="barre">Menu</label>
           <div class="droit">
               <ul>
                   <li> <a href="../inedx.php">Accueil</a></li>
                   <li><a href="">Contact</a></li>
                   <li><a href="">Categorie+</a>
                        <ul>
                         <li><a href="./categorie-croissance.php">Croissance personnel</a></li>
                         <li><a href="./categorie-humain.php">Psychologie et comportement humain</a></li>
                         <li><a href="./categorie-motivation.php">Motivation-Inspiration</a></li>
                         <li><a href="./categorie-confiance.php">Confience en soi</a></li>
                           <!-- <li><a href="">lorem</a></li> -->
                        </ul>

                      </li>

                  </ul>
              </div>
         </div>
          <div class="gauche">
              <input type="search" placeholder="recherhce.."> 
            <ul>
              <a href="./php/connexion.php"><img src="../image/user.png" alt=""></a>
              <a href="./panier.php"><img src="../image/panier.png" alt=""></a>
            </ul>
          </div>
      </nav>
  <!--fin barre de navigation  -->
  <!-- debut section 1 -->
  <section class="section1">
      <div class="achat">
         <div class="livre">
             <img src="../image/livre croissance personnellle.jpeg" alt="nkvbn">
         </div>

          <div class="info">
             <p class="nom">L'alchimiste</p>
             <p class="auteur">Paulo Coelho <span>(Auteur)</span></p>
             <p class="page">224 pages, Paru le 08/11/2017</p>
             <div class="prix">
             <p>Prix:</p>
             </div>
             <div class="button"><a href="./connexion.php" style="text-decoration: none; color: white;">Ajouter au panier<a></div>
          </div>
          <div class="graph">
            <h2 class="nom">Paulo Coelho <span>(Auteur)</span></h2>
            <p>Paulo Coelho est né au Brésil à Rio de Janeiro en 1947. C'est un romancier, journaliste et interprète. Avec la publication de L'Alchimiste en 1994, il acquis une réputation international en vendant son roman à plusieurs dizaines de millions d'exemplaires. Aujourd'hui ses romans ont été traduits dans plus de 80 langues dans le monde.</p>
        </div>
      </div>
  </section>
<!-- fin de la section1 -->
<!-- debut section2 -->
  <section class="resumé">
      <div class="resum">
         <div class="extrait">
             <h2>Resumé</h2>
             <p>"Accomplir sa légende personnelle est la seule et unique obligation de l´homme.""Mon coeur craint de souffrir, dit le jeune homme à l'Alchimiste, une nuit qu'ils regardaient le ciel sans lune.- Dis-lui que la crainte de la souffrance est pire que la souffrance elle-même. Et qu'aucun coeur n'a jamais souffert alors qu'il était à la poursuite de ses rêves."Santiago, un jeune berger andalou, part à la recherche d'un trésor enfoui au pied des Pyramides. Lorsqu'il rencontre l'Alchimiste dans le désert, celui-ci lui apprend à écouter son coeur, à lire les signes du destin et, par-dessus tout, à aller au bout de son rêve.Merveilleux conte philosophique destiné à l'enfant qui sommeille en chacun de nous, ce livre a marqué une génération de lecteurs.</p>
         </div>
      </div>
  </section>
</body>
</html>