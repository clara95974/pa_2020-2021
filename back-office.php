<!DOCTYPE html>

<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Back-office</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>


    <form action="back-office1.php" method="post">
      <p>Veuillez saisr le titre de votre histoire</p>
      <input type="text" name="titre" placeholder="titre">
      <div class="mb-3">
      <p>Veuillez saisr votre paragraphe</p>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="saisir votre texte" name="texte"></textarea>
      </div>
      <div class="mb-3">
        <input type="text" name="choix1" placeholder="choix1">
        <input type="text" name="choix2" placeholder="choix2">
      </div>
      <input type="submit" value="fin du chapitre">
    </form>

    <p>Note: Pour effectuer un saut de ligne utiliser "\n"</p>
  </body>
</html>
