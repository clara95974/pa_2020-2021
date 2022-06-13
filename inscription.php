<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>le ministere du mystere</title>
  </head>
  <header>
    <nav class="navbar navbar-expand-lg px-3">
                <a href="index.php"> <img class="navbar-brand"src="image/Logo.jpg" alt="logo" height="100px"></a>
    </nav>
  </header>
  <body>
    <main class="container">
      <section>
      <p class="titre">Merci de vouloir rejoindre notre groupe   <a class="agent" href="inscription_agent.php">🥰</a> </p>
      <br>
      <?php if (isset($_GET['message'])){
        echo '<p >' . htmlspecialchars($_GET['message']) . '</p>';
      } ?>
        <div class="row" >
      <form action="verification_inscription.php" method="post" class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="mb-3">
          <p class="form-label">Nom</p>
          <input type="text" name="name" class="form-control" placeholder="saisir votre nom">
        </div>
        <div class="mb-3">
          <p class="form-label">Prénom</p>
          <input type="text" name="surname" class="form-control" placeholder="saisir votre prénom">
        </div>
        <div class="mb-3">
          <p class="form-label">Date de naissance</p>
          <input type="date" name="date" class="form-control" placeholder="jj/mm/aaaa">
        </div>
      </div>
  <div class="mb-3">
    <p class="form-label">Adresse email</p>
    <input type="email" name="email" class="form-control" placeholder="saisir votre email">
  </div>
  <div class="mb-3">
    <p class="form-label">Pseudo</p>
    <input type="text" name="pseudo" class="form-control" placeholder="saisir votre pseudo">
  </div>
  <div class="mb-3">
    <p class="form-label">Mot de passe</p>
    <input type="password" name="password1" class="form-control" placeholder="saisir votre mot de passe" minlength="4">
  </div>
  <div class="mb-3">
    <p class="form-label">Confirmation du mot de passe</p>
    <input type="password" name="password2" class="form-control" placeholder="confirmer votre mot de passe" minlength="4">
  </div>
  <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" name="conditons">
      <p class="form-check-label">J'accepte les <a href="#"> conditions d'utilisation </a> et la <a href="#"> politique de confidentialité</a>.</p>
    </div>
    <div class="mb-3 form-check">
      <p>  <?php
        if (isset($_GET['erreur'])) {
           echo $_GET['erreur'];
         } ?>
      </p>
    <input class="btn btn-primary" type="button" value="S'inscrire" name="robot?" data-bs-toggle="modal" data-bs-target="#capchat">

    </div>
    <!--   CAPTCHAT -->
        <?php
            $image = ["image/pikachu.jpg", "image/bulbizarre.jpg", "image/icone2.jpg", "image/chat.jpg", "image/robot.jpg", "image/agent.jpg"];
            $question = ["selectionner les pokemons :", "selectionner les animaux :", "selectionner les humains :"];
            $rand = rand(0,2);
        ?>
      <div class="modal" tabindex="-1" id="capchat">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?php echo '<p>'. $question[$rand].'</p>'; ?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                 <table id="table">
                     <tr>
                       <td><input class="form-check-input" type="checkbox" name="1"><?php   echo '<img src = '. $image[0] .'>' ?></td>
                       <td><input class="form-check-input" type="checkbox" name="2"><?php   echo '<img src = '. $image[5] .'>' ?></td>
                     </tr>
                     <tr>
                       <td><input class="form-check-input" type="checkbox" name="3"><?php   echo '<img src = '. $image[2]  .'>' ?></td>
                       <td><input class="form-check-input" type="checkbox" name="4"><?php   echo '<img src = '. $image[1]  .'>' ?></td>
                     </tr>
                     <tr>
                       <td><input class="form-check-input" type="checkbox" name="5" ><?php   echo '<img src = '. $image[4]  .'>' ?></td>
                       <td><input class="form-check-input" type="checkbox" name="6"><?php   echo '<img src = '. $image[3]  .'>' ?></td>
                     </tr>
                   </table>
            </div>
            <div class="modal-footer">
              <?php
              echo '<input type="hidden"'. 'name="question"'.'value='.  $rand . '>';
              ?>
              <input type="submit" name="" value="Valider">
            </div>
          </div>
        </div>
      </div>
    </form>
    </section>
    </main>
    <?php include("includes/footer.php") ?>
  </body>
</html>
