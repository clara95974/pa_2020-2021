<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title></title>
  </head>
  <body>
    <header class="h">
      <nav class="navbar navbar-expand-lg px-3">
                <a href="index.php"> <img class="navbar-brand"src="image/Logo.jpg" alt="logo" height="100px " ></a>
          </button>
               <div class=" navbar-collapse navbar-expand-lg justify-content-md-end " >
                 <?php
                 if(isset($_SESSION['email'])) {
                  echo "<a href='deconnexion.php' class='btn btn-co btn-lg my-4 scroll-smooth'>Deconnexion</a>" ;
                 }
                 ?>
                  </div>
          </nav>
    </header>
    <main class="container">
      <?php if (isset($_GET['message'])){
        echo '<p >' . htmlspecialchars($_GET['message']) . '</p>';
      } ?>

      <?php

  date_default_timezone_set('Europe/Paris');
  $date = date('d-m-y h:i:s');
?>
    <div  id="form_ajout"  class="main_perso">
      <h4>Réponses aux questions fréquemment posées :</h4>

      <form class="row g-3" action="verif_ajoutfaq.php"  method="post"  enctype="multipart/form-data">
        <div class="col-md-6">

          <input type="text" class="form-control" name="question" placeholder="Entrez la question :">
        </div>

            <div class="form-floating">
      <textarea class="form-control" name="reponse" style="height: 100px"></textarea>
      <label for="floatingTextarea2">Entrez la réponse :</label>
    </div>


      <div class="col-md-6">

        <input type="text" class="form-control" name="mot_cle" placeholder="Entrez les mots clés de la question:">
      </div>

        <div class="col-12" class="coco">
          <button type="submit"  class="btn btn-outline-info" id="ajouter" >Mettre en ligne</button>
        </div>
        </div>
      </form>
      </div>
      </main>
  </body>
</html>
