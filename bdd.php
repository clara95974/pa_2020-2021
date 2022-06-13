<?php
session_start();

include('includes\db.php');
$id =$_GET['id'];

$q = 'SELECT admin FROM utilisateurs WHERE mail = :mail ';
       	$req = $db->prepare($q);
       	$req -> execute(['mail' => $_SESSION['email']
      ]);
       	$resultat = $req ->fetch();
if ($resultat) {
  $q ='DELETE from utilisateurs where id_utilisateur = :id';
  $req =$db->prepare($q);
  $req->execute([
    'id' => $id
  ]);
  $resultat= $req ->fetch();
  if ($resultat) {
    echo "message=compte supprimer";
  }
}else {
  $q ='DELETE from ami where id_user2 = :id';
  $req =$db->prepare($q);
  $req->execute([
    'id' => $id
  ]);
  $resultat= $req ->fetch();
  if ($resultat) {
    echo "message=compte bloquer";
  }
}


?>
