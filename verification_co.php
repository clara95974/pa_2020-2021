<?php
if(isset($_POST['email']) && !empty($_POST['email'])){
  setcookie('email', $_POST['email'], time() + 3600);
}

if (empty($_POST['email']) || empty($_POST['password'])) {
  header('location: connexion.php?message=saisir toutes les données merci');
  exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	header('location: connexion.php?message=Email invalide.');
	exit;
}

include('includes/db.php');
$mail = $_POST['email'];
$password = $_POST['password'];
$q = 'SELECT  id_utilisateur FROM utilisateurs WHERE mail = :mail AND password = :password';
$req = $db -> prepare($q);
$req ->execute([
	'mail' => $_POST['email'],
	'password' => hash('sha512',$_POST['password'])
	]);

$resultat = $req ->fetch(PDO::FETCH_ASSOC);
if($resultat){
	session_start();
	$_SESSION['email'] = $_POST['email'];
	header('location: index.php');
	exit;
}
else {
	header('location: connexion.php?message=Identifiant ou mot de passe incorrects');
	exit;
}

session_start();
        $_SESSION['email'] = $_POST['email'];
        header('location: index.php');
        exit;


 ?>
