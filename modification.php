<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
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
    <div    class="main_perso">
<div class="user">
  <?php
include('includes/db.php');

$q = " SELECT pseudo,mail,prenom,image,nom FROM utilisateurs WHERE mail = :mail" ;
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

 ?>
<form class="" action="verif_modification.php" method="post"   enctype="multipart/form-data">
  <div id='pseudo1'>
    <h3> Pseudo :  </h3>     <input type="text" name="pseudo" value="<?php echo  $pseudo  ?> ">
  </div>
   <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-keyboard-fill" viewBox="0 0 16 16" onclick="keyboard()">
<path d="M0 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6zm13 .25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5a.25.25 0 0 0-.25.25zM2.25 8a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 8.75v-.5A.25.25 0 0 0 2.75 8h-.5zM4 8.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 5 8.75v-.5A.25.25 0 0 0 4.75 8h-.5a.25.25 0 0 0-.25.25zM6.25 8a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 7 8.75v-.5A.25.25 0 0 0 6.75 8h-.5zM8 8.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 9 8.75v-.5A.25.25 0 0 0 8.75 8h-.5a.25.25 0 0 0-.25.25zM13.25 8a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5zm-3-2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h1.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-1.5zm.75 2.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5a.25.25 0 0 0-.25.25zM11.25 6a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5zM9 6.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5A.25.25 0 0 0 9.75 6h-.5a.25.25 0 0 0-.25.25zM7.25 6a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 8 6.75v-.5A.25.25 0 0 0 7.75 6h-.5zM5 6.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 6 6.75v-.5A.25.25 0 0 0 5.75 6h-.5a.25.25 0 0 0-.25.25zM2.25 6a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h1.5A.25.25 0 0 0 4 6.75v-.5A.25.25 0 0 0 3.75 6h-1.5zM2 10.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5a.25.25 0 0 0-.25.25zM4.25 10a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h5.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-5.5z"/>
</svg>
 <h3> Nom :  </h3>  <input type="text" name="Nom" value=" <?php echo $nom  ?>">
 <h3> Prénom : </h3> <input type="text" name="Prenom" value=" <?php echo $prenom  ?>">
 <h3> Mail : </h3> <input type="text" name="Mail" value="<?php echo $mail  ?> ">
 <h3> Image :  </h3> <input type="file" name=Image"" value="<?php echo $image  ?>"   accept="image/png, image/gif, image/jpeg, image/jpg">

 <div><input type="submit" value="Modifier"></div>
</form>
</div>
</main>
<?php include("includes/footer.php") ?>
  </body>
</html>
