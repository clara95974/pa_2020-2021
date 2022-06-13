
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>amis</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <?php include('includes\header.php'); ?>
    <main>
      <?php if (isset($_GET['message'])){
        echo $_GET['message'];
      }
      try {
         $db = new PDO('mysql:host=localhost;dbname=ministre', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (Exception $e) {
          die('Erreur :' . $e->getMessage());
        }
      $q ='SELECT count(id_utilisateur) FROM utilisateurs';
      $req = $db->prepare($q);
      $req->execute();
      $idmax = $req->fetch();
      for ($id=1; $id <=$idmax[0];$id++) {
        $q ='SELECT pseudo, image from utilisateurs where id_utilisateur = :id ';
        $req = $db->prepare($q);
        $req -> execute([
          'id' =>$id
        ]);
        $resultat = $req ->fetch();
        $img = $resultat['image'];
          echo "<div class='div'>";
          echo "<img src='../image/$img' alt='pp' height='100px' class='img'";
          echo "<div class='test'>";
          echo '<a class="dropdown-toggle" href="#" class="pseudo" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">'.
  $resultat['pseudo'].
  '</a>'.'
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">'.'
  <li>'.'<a class="dropdown-item" href="#">'."envoyer message".'</a>'.'</li>'.
  "<li><a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#bloquer' onclick='recupID($id)'>bloquer</a></li>".
  "<li><a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#ami' onclick='recupID($id)'>ajouter en ami</a></li>".
  '</ul>';
          echo "</div>";
          echo '</div>';
      }
      ?>
      <div class="modal fade" id="bloquer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" name="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Voulez vous vraiment bloquer cet utilisateur ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
              <button type="button" id="pseudo" class="btn btn-primary" data-bs-dismiss="modal" onclick="bloquer()" >Oui</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="ami" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" name="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Voulez vous vraiment ajouter cet utilisateur à votre liste d'amis ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
              <button type="button" id="pseudo" class="btn btn-primary" data-bs-dismiss="modal" onclick="ami()" >Oui</button>
            </div>
          </div>
        </div>
      </div>
      <p id="demo">
      </p>
    </main>
    <script src="js.js" charset="utf-8"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
