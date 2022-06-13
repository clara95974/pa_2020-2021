<?php
ini_set('display_errors',1);
if (empty($_POST['email']) || empty($_POST['password1']) || empty($_POST['password2']) || empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['date']) || empty($_POST['pseudo'])) {
 	 header('location: inscription.php?message=Merci de saisir toutes les données');
	 exit;
}

if(isset($_POST['email']) && !empty($_POST['email'])){
         setcookie('email', $_POST['email'], time() + 3600);
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	 header('location: inscription.php?message=Email invalide.');
	 exit;
}

if ($_POST['password1'] == $_POST['pseudo']){
         header('location: inscription.php?message=veuillez saisir un mot de passe différent que le pseudo');
         exit;
}

if (strlen ($_POST['password1'])<4 || strlen($_POST['password1'])>12 ){
	 header('location: inscription.php?message=veuillez saisir un mot de passe contenant au minimun 4 caracteres et au maximun 12 caracteres');
	 exit;
}

if ($_POST['password1'] != $_POST['password2']){
         header('location: inscription.php?message=veuillez saisir les mêmes mot de passe');
         exit;
}

if ($_POST['password1'] != $_POST['password2']){
	 header('location: inscription.php?message=veuillez saisir les mêmes mot de passe.');
	 exit;
}

if (!isset($_POST['conditons'])) {
	 header('location: inscription.php?message=veuillez accepter nos conditions');
 	 exit;
}

//captcha

switch ($_POST['question']) {
  case '0':
  if (isset($_POST['2']) || isset($_POST['3']) || isset($_POST['5']) || isset($_POST['6'])) {
    header('location: inscription.php?erreur=dommage, veuillez réesayer ');
    exit;
  }
    break;

    case '1':
    if (isset($_POST['2']) || isset($_POST['1']) || isset($_POST['5']) || isset($_POST['4'])) {
      header('location: inscription.php?erreur=dommage, veuillez réesayer ');
      exit;
    }

      break;

      case '2':
      if (isset($_POST['1']) || isset($_POST['3']) || isset($_POST['4']) || isset($_POST['6'])) {
        header('location: inscription.php?erreur=dommage, veuillez réesayer ');
        exit;
      }

        break;
}
//fin captcha

/*     BDD */
include('includes/db.php');
	$q = 'SELECT mail FROM utilisateurs WHERE mail = :email';
	$req = $db->prepare($q);
	$req -> execute(['email' => $_POST['email']
	]);
	$resultat = $req ->fetch();
	 if ($resultat) {
 	header("location: inscription.php?message=Email déjà utilisé, vérifier que vous n'avez pas déjà un compte ");
 	exit;
 	}

 	$q = 'SELECT pseudo FROM utilisateurs WHERE pseudo = :pseudo';
 	$req = $db->prepare($q);
 	$req -> execute(['pseudo' => $_POST['pseudo']
 	]);
 	$resultat = $req ->fetch();
  	if ($resultat) {
   	header("location: inscription.php?message=Ce pseudo est déjà utilisé par un autre agent, veuillez en saisir un autre merci🤠 ");
   	exit;
	}

	$email= $_POST['email'];
	$pseudo= $_POST['pseudo'];
	$objet= 'inscription ';
	$contenu= '<strong>'.' Vous avez demandez de créer votre compte!'.'</strong>'.'<br>'.
	"Bonjour $pseudo,'<br>'

	Vous avez demandé la création de votre compte.'</br>'
	Au nom des administrateurs du sites, Nous avons le plaisir et la joie de vous informer que votre candidature au sein du ministére à étè retenue.'<br>'
	Vous venez de rejoindre officiellement notre agence.'<br>'
	Cordialement,
	Le Ministre du Mystére.
	";

	$q ='INSERT INTO utilisateurs(mail,pseudo,nom,prenom,date_de_naissance,password) Values(:email,:pseudo,:nom,:prenom,:date,:password)';
	$req = $db->prepare($q);
	$reponse = $req -> execute([
	 'email' => $_POST['email'],
	 'pseudo' => $_POST['pseudo'],
	 'nom' => $_POST['surname'],
	 'prenom' => $_POST['name'],
	 'date' => $_POST['date'],
	 'password' =>hash('sha512', $_POST['password1'])
	]);

$entetes =
	'Content-type: text/html; charset=utf-8'. "\r\n".
	'From: leministere1i2@gmail.com'."\r\n" .
	'X-Mailer: PHP/' . phpversion();

$reponse = mail($email,$objet,$contenu,$entetes);

if(!$reponse){
header('location: inscription.php?message=Erreur lors de la création du compte ');
exit;
}else{
header('location: connexion.php?message=Compte créeer avec succés');
exit;
}

 ?>
