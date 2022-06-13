<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
    <title>le ministere du mystere</title>
  </head>
  <header >
    <nav class="navbar navbar-expand-lg px-3">
                <a href="index.php"> <img class="navbar-brand"src="image/Logo.jpg" alt="logo" height="100px"></a>
    </nav>
  </header>
  <body>
    <main class="container mainco">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
      <p class="titre">Connectez-vous au ministére du mystére</p>
      <br>
      <?php if (isset($_GET['message'])){
        echo '<p >' . htmlspecialchars($_GET['message']) . '</p>';
      } ?>
      <div class="row" >
      <form action="verification_co.php" method="post" class="col-xs-12 col-sm-12 col-md-8 col-lg-8 ">
    <div class="mb-3">
    <p class="form-label formco">Adresse Email </p>
    <input type="email" name='email' class="form-control" placeholder="Saisir votre email">
    </div>
    <div class="mb-3">
    <p class="form-label formco">Password</p>
    <input type="password" name='password' class="form-control" placeholder="Saisir votre mot de passe">
    </div>
  <div class="mdp">  <a href="recup.php">Vous avez oublié votre mdp?</a> </div>
   <button type="submit" class="btn btn-primary btn-cnx">Connexion</button>
    </form>
  </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col align-self-center">
           <p id="nv">Vous étes nouveau ?</p>
<a href="inscription.php" class="btn  btn-lg my-4 scroll-smooth " id="inscrip">S'incrire</a>
    </div>
    </div>
    </main>
    <?php include("includes/footer.php") ?>
    </body>
    </html>
