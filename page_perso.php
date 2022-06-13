<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Mon compte</title>
  </head>
  <body>
    <header class="h">
      <nav class="navbar navbar-expand-lg px-3">
                <a href="index.php"> <img class="navbar-brand"src="image/Logo.jpg" alt="logo" height="100px " ></a>
          </button>
               <div class=" navbar-collapse navbar-expand-lg justify-content-md-end " >
                      <a href="deconnexion.php" class="btn btn-co btn-lg my-4 scroll-smooth ">Deconnexion</a>
                  </div>
          </nav>
    </header>
    <main   class="container">
<div    class="main_perso">
      <div class="container">
        <div class="row">
          <div class="col-4">
            <h1 class="space">Mes informations</h1>
          </div>
          <div class="col-3">
            <button  type="button"  class="btn btn-outline-secondary"> <a id="modifier" href="modification.php">Modifier</a> </button>
          </div>
        </div>
      </div>

  <?php
include('includes/db.php');

$q = " SELECT * FROM utilisateurs WHERE mail = :mail" ;
$req = $db  -> prepare($q);
$req -> execute([
 'mail' => $_SESSION['email']
]);

$reponse = $req -> fetch();

$pseudo = $reponse['pseudo'];
$mail =$reponse['mail'];
$nom = $reponse['nom'];
$image = $reponse['image'];
$prenom =  $reponse['prenom'];
$id = $reponse['id_utilisateur'];
 ?>

 <div class="container">
   <div class="row">
     <div class="col-4">
<h3> Pseudo : <?php echo  $pseudo  ?> </h3>
<h3> Nom : <?php echo $nom  ?> </h3>
<h3> Prénom : <?php echo $prenom  ?> </h3>
<h3> Mail : <?php echo $mail  ?> </h3>
<h3> Image : <?php echo "<img src='image/$image' alt='pp'>"  ?> </h3>
<div   class="space" class="demandes">

<h1> Mes demandes d'amis!</h1><button  type="button"  class="btn btn-outline-secondary"> <a id="modifier" href="ttutilisateurs.php">Voir tous les utilisateurs</a> </button>
</div>

<div   class="space" class="amis">
  <h1>Mes Amis</h1>
  <?php
  $q = 'SELECT id_user2 from ami where id_user1 = :id';
  $req = $db ->prepare($q);
  $req-> execute([
    'id' => $id
  ]);
  $resultat = $req-> fetch();
  if($resultat){
    $idami = $resultat['id_user2'];

  $q = 'SELECT pseudo,image from utilisateurs where id_utilisateur = :id';
  $req = $db ->prepare($q);
  $req-> execute([
    'id' => $idami
  ]);
  $resultat = $req-> fetch();
  echo "<img src='image/$image' alt='pp'>";
  echo '<p>'.$resultat['pseudo'].'</p>';}
   ?>
</div>
</div>

</div>

</div>

</div>
</div>
</main>
<?php include("includes/footer.php") ?>
  </body>
</html>
