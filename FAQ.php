<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="FAQ.js">

    </script>
    <meta charset="utf-8">
    <title>Foire à question</title>
  </head>

  <body>
    <header >
      <nav class="navbar navbar-expand-lg px-3">
                <a href="index.php"> <img class="navbar-brand"src="image/Logo.jpg" alt="logo" height="100px "></a>
                <div class=" navbar-collapse navbar-expand-lg justify-content-md-end " >
                 <?php
                 if(isset($_SESSION['email'])) {
                  echo "<a href='deconnexion.php' class='btn btn-co btn-lg my-4 scroll-smooth'>Deconnexion</a>" ;
                 }
                 ?>
                  </div>
      </nav>
    </header>
    <?php if (isset($_GET['message'])){
      echo '<p >' . htmlspecialchars($_GET['message']) . '</p>';
    } ?>
<!--  <?php
  include('includes/db.php');
  if(isset($_SESSION['email'])){

      $q = 'SELECT admin FROM utilisateurs WHERE mail = :mail ';
      $req = $db->prepare($q);
      $req -> execute(['mail' => $_SESSION['email']
    ]);
      $resultat = $req ->fetch();
}

 ?>-->
    <main class="container">
      <form id="motclé" >

        <div class="input-group ">
          <div class="form-group">

            <input type="text" class="form-control" id="text" aria-describedby="" placeholder="insérez votre recherche">
          </div>
              <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <button type="button" class="btn btn-outline-primary" id="rechercher" onclick="motclé()">
                <p>Rechercher</p>
            </button>
            <div class="btn-group" role="group">
              <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="dropdown()">
                <span class="sr-only"></span>
              </button>
              <div id="items" class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>

             </input>
            </div>

      </form>
      <div class="col-1">
      <?php
      if ($resultat['admin'] == 1) {
        echo "<button  type='button'  class='btn btn-secondary' class='btn-ajout' > <a class='ajout' href='ajouterfaq.php'>Ajouter</a> </button> ";
      }

       ?>
      </div>
      <div class="container" id="test">
        <?php $q = 'SELECT count(id_questions) FROM questions  ';
        $req = $db->prepare($q);
        $req -> execute();
        $idmax = $req ->fetch();

        for($id =1 ;$id <= $idmax[0] ; $id++){
          $q = 'SELECT * from questions where id_questions  = :id_questions';
          $req = $db->prepare($q);
          $req -> execute(['id_questions' => $id
          ]);

          $resultat = $req ->fetch();

          echo "<div class ='row les_réponses' id=$id >  ";

          echo '<h3 class="col-12"  >'. $resultat['question'] .'</h3>'.
        '<p class="col-8"><strong>Description</strong> :</br>'. $resultat['reponse'].'</p>'.
            '<p class="col-4"><strong>mot clés:</strong> : '.  $resultat['mot_cle'] .'</p>';
          echo "</div>";

        }
         ?>
      </div>



    </main>

  </body>
</html>
