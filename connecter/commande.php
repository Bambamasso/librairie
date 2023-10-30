<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>commande</title>
</head>
<body>
          <style>

            .commande{
                width:100%;
                display:flex;
                justify-content:center;
                margin-top:100px
            }

.livres form{
    width: 100%;
    max-width: 800px;
    display: flex;
     flex-direction: column;
    gap: 1.5em;
 }

 .livres form .group {
    display: flex;
    flex-direction: column;
 }

 .livres form label {
   color:#010c37 ;
   width: fit-content;
   font-family:'Inter', sans-serif ;

 }

 .livres select{
    border: none;
    outline: none;
    border: 1px solid #d4d4d4;
    padding: 10px;
    resize: none;
 }

 .livres form input {
    border: none;
    outline: none;
    border: 1px solid #d4d4d4;
    padding: 10px;
    resize: none;
   
   /* background: rgb(180, 182, 183); */
  }

          </style>


     <div class="commande"> 
        <div class="livres">
            <h1>Confirmation de la commande</h1>
            <form action="">
            <div class="group">
              <label for="">Numéro</label>
              <input type="number">
            </div>

            <div class="group">
              <label for="">ville</label>
              <select name="" id="">
               <option value="">Abidjan</option>
               <option value="">Bouaké</option>
               <option value="">Yamoussoukro</option>
               <option value="">Daloua</option>
               <option value="">Séguéla</option>
               <option value="">Divo</option>
              </select>
            </div>
            <div class="group">
              <label for="">commune</label>
               <select name="" id="">
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
                  <option value=""></option>
               </select>
            </div>
            <div class="group">
              <label for="">moyen de payement</label>
              
              <span>Mobile money</span><input type="radio">
              <span>payer à la libraison</span><input type="radio">
            </div>
            <input type="submit" value="valider la commande">
            </form>
        </div>
     </div>
</body>
</html>