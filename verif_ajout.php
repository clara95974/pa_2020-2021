<?php
session_start();

if (empty($_POST['salle']) || empty($_POST['horaire']) || empty($_POST['adresse']) || empty($_POST['place']) || empty($_POST['ville']) || empty($_POST['code']) || empty($_POST['prix'])) {
 	 header('location: ajout.php?message=Merci de saisir toutes les données');
	 exit;}

 if (strlen ($_POST['code'])!=5 ){
 	 header('location: ajout.php?message=veuillez saisir un code postal valide');
 	 exit;
 }

 if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){

   $acceptable = [
   'image/jpeg',
   'image/png',
   'image/gif',
   'image/PNG',
    'image/JPEG'
  ];
   if(!in_array($_FILES['image']['type'], $acceptable)){
   header("location: ajout.php?message=Format de fichier incorrect");
   exit;
   }

   $maxSize = 2 * 1024 * 1024;
   if($_FILES['image']['size'] > $maxSize ){
   header("location: ajout.php?message=le fichier est trop volumineux");
   exit;
   }
}

 include('includes/db.php');
 	$q = 'SELECT nom FROM salles WHERE nom = :nom and adresse = :adresse ';
 	$req = $db->prepare($q);
 	$req -> execute(['nom' => $_POST['salle'],
  'adresse' => $_POST['adresse']
 	]);
 	$resultat = $req ->fetch();
 	 if ($resultat) {
  	header("location: ajout.php?message=La salle existe déja ");
  	exit;
  	}

    $q = 'SELECT id_utilisateur FROM utilisateurs WHERE   mail = :email  ';
    $req = $db->prepare($q);
    $req -> execute(['email' =>$_SESSION['email']

    ]);
    $auteur_id = $req ->fetch();

    $path = "image";

    if(isset($_FILES['image']['name'])){
      $image = $_FILES['image']['name'];
      $filename = $_FILES['image']['name'];
      $array = explode('.',$filename);
      $ext = end($array);
      $filename ='image-'. time() . '.' . $ext;
      $destination = $path . '/' . $filename;
      move_uploaded_file($_FILES['image']['tmp_name'], $destination);
    }else {
          $filename ='';
    }

    	$q ='INSERT INTO salles(auteur,nom,horaire,nbr,description,image,adresse,ville,code,prix) Values(:auteur,:nom,:horaire,:nbr,:description,:image,:adresse,:ville,:code,:prix)';
    	$req = $db->prepare($q);
    	$reponse = $req -> execute([
    	 'auteur' => $auteur_id[0],
    	 'nom' => $_POST['salle'],
    	 'horaire' => $_POST['horaire'],
    	 'nbr' => $_POST['place'],
    	 'description' => $_POST['description'],
    	 'image' =>$filename,
        'adresse' => $_POST['adresse'],
       'ville' => $_POST['ville'],
       'code' => $_POST['code'],
       'prix' => $_POST['prix']
    	]);

      if(!$reponse){
      header('location: ajout.php?message=Erreur lors de la création du compte ');
      exit;
      }else{
      header('location: salles.php?message=Salles créeer avec succés');
      exit;
      }
 ?>
