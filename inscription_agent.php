<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inscription adminstrateur</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/icone2.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <header>
     <nav class="navbar navbar-expand-lg px-3">
      <a href="index.php"><img class="navbar-brand" src="image/Logo.jpg" alt="logo" height="100px"> </a>
     </nav>
    </header>
    <main class="container">
      <div class="row">
      <p>Vous êtes sur la page pour les administrateurs </p>
      <form action="inscription_agent.php" method="post">
        <?php if(isset($_GET['message'])){
          echo '<p>'. htmlspecialchars($_GET['message']).'</p>';
        } ?>
        <div class="mb-3">
          <p>Email</p>
          <input type="mail" name="mail_admin" placeholder="Saisir votre email">
        </div>
        <div class="mb-3">
          <p>Pseudo</p>
          <input type="text" name="pseudo_admin" placeholder="Saisir votre pseudo">
        </div>
        <div class="mb-3">
          <p>Mot de passe</p>
          <input type="password" name="password_admin" placeholder="Saisir votre mot de passe">
        </div>
        <input class="btn btn-primary" type="submit" value="S'inscrire" name="submit">
        </div>
      </form>
      </div>
    </main>
    <?php include("includes/footer.php") ?>
  </body>
</html>
