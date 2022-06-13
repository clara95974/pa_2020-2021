<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    	<link rel="stylesheet" type="text/css" href="css/style.css">
        <title>le ministere du mystere</title>
  </head>
  <header >

    <nav class="navbar navbar-expand-lg px-3">

                <a href="index.php"> <img class="navbar-brand"src="image/Logo.jpg" alt="logo" height="100px"></a>
    </nav>
  </header>
  <body>
    <main class="container   ">
    <form action="recup_final.php" method="post">
              <p>Veuillez entrer votre adresse mail</p>
              <input type="email" name="email" placeholder="Entrez votre adresse mail">
    <button type="submit" class="btn btn-primary">Récupérer mon compte</button>
      </form>
  </main>
<?php include("includes/footer.php") ?>
</body>
</html>
