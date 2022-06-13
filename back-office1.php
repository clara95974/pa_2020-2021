<?php session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Back-office</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <?php
    $titre=$_POST['titre'];
    $path = $titre;
    if(!file_exists($path)){
      mkdir($path, 0777);
   }

    $text=$_POST['texte'];
    $choice1=$_POST['choix1'];
    $choice2=$_POST['choix2'];
    $nb = 1;
    $nb2 = 1;
    $page = 'page'.$nb.'.php';
    $branche = 'branche'.$nb2.'.php';
     echo '<strong>' .$titre . '</strong>';
    $log = fopen("$branche", 'a+');
    $line = "choix$nb2";
    copy($branche, "$titre/$branche");
    unlink($branche);
    $nb2=2;
    $branche1 = 'branche'.$nb2.'.php';
    $log = fopen($branche1, 'a+');
    $line = "choix$nb2";
    fputs($log, $line);
    copy($branche1, "$titre/$branche1");
    unlink($branche1);

    $log = fopen("$page", 'a+');
    $line ='<h1>'.$titre.'</h1><br>'.$text.'<br>'.'<button type='.'button'.'name='.'button'.'>'.'<a href='.$branche.'>'.$choice1.'</a>'.'</button>'.'<br>'.'<button type='.'button'.'name='.'button'.'>'.'<a href='.$branche1.'>'.$choice2.'</a>'.'</button>';
    fputs($log, $line);
    fclose($log);
    copy("$page", "$titre/$page");
    unlink($page);
    try {
      $db = new PDO('mysql:host=localhost;dbname=histoire', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
     } catch (Exception $e) {
       die('Erreur :' . $e->getMessage());
     }

     $q = 'SELCT pseudo from utilisateur wkere email = :email';
     $req = $db->prepare($q);
     $rep = $req ->execute([
     'email' = $_session['email']
   ]);
   $pseudo = $rep -> fetch();
     $q ='INSERT INTO jeux(titre,auteur) Values(:titre, :auteur)';
   	$req = $db->prepare($q);
   	$reponse = $req -> execute([
   	 'titre' => $titre,
     'auteur' => $pseudo
   ]);
      ?>
      <div class="mb-3">
  <p>
    <?php
     echo '<p> Voici ce que vous avez ecrit au chapitre précedent : </p>';
     echo '<p>'.$text.'</p>';
     echo " Vous etes au moment ou  vous avez selectionné le choix suivant : $choice1";

    ?>
  </p>
</div>
<p>Veuillez saisr la suite</p>
<form action="verif.php" method="post">
<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="saisir votre texte" name="texte"></textarea>
</div>
<div class="mb-3">
<?php  echo '<input type="hidden"'. 'name="path"'.'value='.  $titre . '>'; ?>
  <input type="text" name="choix1" placeholder="choix1">
  <input type="text" name="choix2" placeholder="choix2">
  <input type="checkbox" name="stop" class="form-check-input"><label>Arreter cette branche</label>
</div>
<input type="submit" value="fin du chapitre">
</form>
<p>Note: Pour effectuer un saut de ligne utiliser "\n"</p>


  </body>
</html>
