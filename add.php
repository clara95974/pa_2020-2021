<?php

session_start();
$idami = $_GET['id'];
include('includes\db.php');

  $q = 'SELECT id_utilisateur FROM utilisateurs WHERE mail = :mail ';
         	$req = $db->prepare($q);
         	$req -> execute(['mail' => $_SESSION['email']
        ]);
          $resultat = $req->fetch();
          $me = $resultat['id_utilisateur'];
$q ='INSERT INTO ami(id_user1, id_user2) value(:id1, :id2)';
$req =$db->prepare($q);
$req->execute([
  'id1'=>$me,
  'id2'=> $idami
]);
  $resultat= $req ->fetch();
if ($resultat) {
  echo "message=$pseudo est devenu votre ami";
}

?>
