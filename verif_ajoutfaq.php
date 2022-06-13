<?php
session_start();

if (empty($_POST['question']) || empty($_POST['reponse']) || empty($_POST['mot_cle'])) {
 	 header('location: ajouterfaq.php?message=Merci de saisir toutes les données');
	 exit;}

 include('includes/db.php');
 	$q = 'SELECT question FROM questions WHERE question = :question  ';
 	$req = $db->prepare($q);
 	$req -> execute(['question' => $_POST['question']
 	]);
 	$resultat = $req ->fetch();
 	 if ($resultat) {
  	header("location: ajouterfaq.php?message=La question existe déjà ");
  	exit;
  	}

    include('includes/db.php');
    	$q = 'SELECT reponse FROM questions WHERE  reponse = :reponse ';
    	$req = $db->prepare($q);
    	$req -> execute([
     'reponse' => $_POST['reponse']
    	]);
    	$resultat = $req ->fetch();
    	 if ($resultat) {
     	header("location: ajout.php?message=La réponse existe déjà ");
     	exit;
     	}
    $q = 'SELECT id_utilisateur FROM utilisateurs WHERE   mail = :email  ';
    $req = $db->prepare($q);
    $req -> execute(['email' =>$_SESSION['email']

    ]);
    $auteur_id = $req ->fetch();


    	$q ='INSERT INTO questions(question,reponse,mot_cle) Values(:question,:reponse,:mot_cle)';
    	$req = $db->prepare($q);
    	$reponse = $req -> execute([
    	 'question' => $_POST['question'],
    	 'reponse' => $_POST['reponse'],
    	 'mot_cle' => $_POST['mot_cle']
    	]);

      if(!$reponse){
      header('location: ajouterfaq.php?message=Erreur lors de la création de la réponse ');
      exit;
      }else{
      header('location: FAQ.php?message=Réponse créeer avec succés');
      exit;
      }
 ?>
