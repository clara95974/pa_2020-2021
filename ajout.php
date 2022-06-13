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
    <div  id="form_ajout"  class="main_perso">

      <form class="row g-3" action="verif_ajout.php"  method="post"  enctype="multipart/form-data">
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Nom de salle</label>
          <input type="text" class="form-control" name="salle">
        </div>
        <div class="col-md-3">
          <label for="inputZip" class="form-label">Horaires</label>
          <input type="text" class="form-control" name="horaire">
        </div>
        <div class="col-md-3">
          <label for="inputZip" class="form-label">Nombres de places</label>
          <input type="number" class="form-control" name="place" >
        </div>
            <div class="form-floating">
      <textarea class="form-control" name="description" style="height: 100px"></textarea>
      <label for="floatingTextarea2">Description</label>
    </div>
    <div class="col-12">
      <label for="inputAddress2" class="form-label">Image </label>
      <input type="file" class="form-control" accept="image/jpeg,image/gif,image/png" name="image">
    </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">Adresse </label>
          <input type="text" class="form-control"  placeholder="Adresse de la salle" name="adresse">
        </div>
        <div class="col-md-8">
          <label for="inputCity" class="form-label">Ville</label>
          <input type="text" class="form-control" name="ville" >
        </div>
        <div class="col-md-4">
          <label for="inputZip" class="form-label">Code postal</label>
          <input type="text" class="form-control" name="code" >
        </div>
        <div>
        <div class="col-md-2">
          <label for="inputZip" class="form-label">Prix</label>
          <input type="text" class="form-control" name="prix" >
        </div>
      </div>
        <div class="col-12" class="coco">
          <button type="submit"  class="btn btn-outline-info" id="ajouter" >Mettre en ligne</button>
        </div>
      </form>
      </div>
      </main>
      <?php include("includes/footer.php") ?>
  </body>
</html>
