
<?php

session_start();

include('includes/db.php');

$pseudo = $_POST['pseudo'];
$mail =$_POST['mail'];
$nom = $_POST['nom'];
$prenom =  $_POST['prenom'];
if(isset($_FILES['image']['nom'])){
  $image = $_FILES['image']['nom'];
  $filename = $_FILES['image']['name'];
  $array = explode('.',$filename);
  $ext = end($array);
  $filename ='image-'. time() . '.' . $ext;
  $destination = $path . '/' . $filename;
  move_uploaded_file($_FILES['image']['tmp_name'], $destination);
}

$q = 'SELECT mail FROM utilisateurs WHERE mail = :mail and mail != :email';
$req = $db->prepare($q);
$req -> execute([
  'mail' => $mail,
  'email' => $_SESSION['email']
]);
$resultat = $req ->fetch();
 if ($resultat) {
header("location: modification.php?message=Email déjà utilisé");
exit;
}

$q = 'SELECT pseudo FROM utilisateurs WHERE pseudo = :pseudo and mail != :email';
$req = $db->prepare($q);
$req -> execute([
  'pseudo' => $_POST['pseudo'],
  'email' => $_SESSION['email']

]);
$resultat = $req ->fetch();
  if ($resultat) {
  header("location: inscription.php?message=Ce pseudo est déjà utilisé par un autre agent, veuillez en saisir un autre merci🤠 ");
  exit;
}

$q =  'UPDATE utilisateurs Set prenom = :prenom, pseudo = :pseudo, mail = :newmail, nom = :nom  WHERE mail = :email';
$req = $db-> prepare($q);
$req -> execute([
  'email' => $_SESSION['email'],
  'pseudo' => $pseudo,
  'prenom' => $prenom,
  'nom' => $nom,

  'newmail' => $mail
]);

header("location: page_perso.php?message=modification réussie");
 ?>
