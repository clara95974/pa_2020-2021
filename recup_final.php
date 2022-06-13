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
    <main class="container">
      <h1>Veuillez vérifier vos mails</h1>
      <br>
<?php
$email= $_POST['email'];
$objet= 'Mot de passe oublié ? ';
$contenu= '<html>'.
              '<head>'.
                '<style type="text/css">
                  <!--
                    /*<![CDATA[*/
                    @import "css/recup_final.css";
                    /*]]>*/
                    -->
                  </style>'.
              '</head>'.
                '<header style ="background: #060A33">'.'<img src="image/Logo.jgp" alt="logo" >'.
                  '<h1 style= "color: white">'.' Vous avez demandez de recupérer votre compte !'.'</h1>'.
                '</header>'.
              '<body style="background : #FFF3C9">'.
                '<main>'.
                  '<br>'.
                  '<br>'.
                  '<strong style="color: black">'.
                    'Bonjour ici Selfi du Ministère du mystere,'.
                  '</strong>'.
                  '<br>'.
                    '<p style = "color: inherit">'.
                      "Bonjour Mme/M
                      Vous avez demandé de récuperer votre compte et je l'ai dit 25 fois dans le mail . Je voudrai vous demander de vous en rapeler dans les plus brefs délais oooooooh et si on metait des trucs en mode indices sur le mdp ça pourrait être marrant. Bref je vais raconter de la merde parce que je m'ennuie mdrr eh vas-y faut que le mail ressorte correctemen parce que sinon ça vas me saouler
                      en plus vas-y le code il veut pas marcher ça m'enerve eh poto met correctement le header et le footer y'a quoi.
                      ".
                      '<br>'.'<p>'.'SI vous souhaitez récuperer votre compte veuillez cliquer '.'<a href="https://www.google.com/">'.'ici \\(ceci est un test)//'.'</a>'.'</p>'.'<br>'.
                      '<h6>'.  'En espérant vous voir le plus rapidement possible sur Le ministère du mystere votre messagère, Selfi la naze'.
                  '</h6>'. '</main>'.
                    '<footer style ="background:#060A33">'.
                      '<h3 style =  "color: white">
                        &copy;&nbsp;les filles 2021
                      </h3>'.
                    '<footer>'.
                  '</body>'.
                '</html>';

$entetes =
'Content-type: text/html; charset=utf-8' . "\r\n" .
'From: leministere1i2@gmail.com' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

if(mail($email,$objet,$contenu,$entetes)){
    echo 'Votre message a été envoyé avec succès!';
} else{
    echo "Impossible d'envoyer des emails. Veuillez réessayer.";
}
 ?>
      <p>Le mail pourrait se trouver dans les couriers indésirables faites attention </p>
   </main>
   <?php include("includes/footer.php") ?>
</body>
</html>
