<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Jeux</title>
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
    <main >
    <?php
    include('includes\db.php');
    if(isset($_SESSION['email'])){
        $q = 'SELECT admin FROM utilisateurs WHERE mail = :mail ';
        $req = $db->prepare($q);
        $req -> execute(['mail' => $_SESSION['email']
      ]);
        $resultat = $req ->fetch();
        if ($resultat['admin'] == 1) {
          echo "<button  type='button'  class='btn btn-secondary' class='btn-ajout' > <a class='ajout' href='back-office.php'>Ajouter</a> </button> ";
        }
}
    for ($i=1; $i <4 ; $i++) {
      $q='SELECT titre FROM jeux where id = :i';
      $req = $db->prepare($q);
      $rep = $req->execute([
        'i'=> $i
      ]);
      $path = $req ->fetch(PDO::FETCH_ASSOC);
      $path = $path['titre'];
      echo "<div>";
      echo '<a href="/admin/'.$path.'/page1.php">'.$path.'(utilisateur)'.'</a>';
      echo "</div>";
    }
     ?>
     </main>
  </body>
</html>
