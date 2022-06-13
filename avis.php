<?php
session_start();
include('includes/db.php');
$idsalle = $_GET['id'];
$type=  $_GET['type'];

if (isset($_SESSION['email'])) {
  $q = 'SELECT id_utilisateur from utilisateurs where mail = :email';
  $req = $db->prepare($q);
  $req->execute([
    'email' => $_SESSION['email']
  ]);
  $resultat = $req ->fetch(PDO::FETCH_ASSOC);
  $id = $resultat['id_utilisateur'];
  $id = intval($id);
  if($type == 'like'){
    $q = 'SELECT id from avis where idsalle = :idsalle and id_utilisateur = :id and aime = :aime';
    $req = $db->prepare($q);
    $req->execute([
      'idsalle' => $idsalle,
      'id' => $id,
      'aime' => 1
    ]);
    if($req ->fetch(PDO::FETCH_ASSOC) >0){
      $anwser =1;
    }else {
      $anwser = 0;
    }
    if ($anwser == 1) { //si deja 1 like pour cette table par l'utilisateur
      $q = 'DELETE FROM avis where idsalle = :idsalle and id_utilisateur = :id';
      $req = $db->prepare($q);
      $req->execute([
        'idsalle' => $idsalle,
        'id' => $id
      ]);
    }else{
      $q = 'SELECT id from avis where idsalle = :idsalle and id_utilisateur = :id and aime_pas = :aime_pas';
      $req = $db->prepare($q);
      $req->execute([
        'idsalle' => $idsalle,
        'id' => $id,
        'aime_pas' => 1
      ]);
      if($req ->fetch(PDO::FETCH_ASSOC) >0){
        $anwser =1;
      }else {
        $anwser = 0;
      }
      if ($anwser == 1) { //si deja 1 like pour cette table par l'utilisateur
        $q = 'DELETE FROM avis where idsalle = :idsalle and id_utilisateur = :id';
        $req = $db->prepare($q);
        $req->execute([
          'idsalle' => $idsalle,
          'id' => $id
        ]);
      }
      $q = 'INSERT INTO avis(aime,id_utilisateur,idsalle)  VALUES(:aime,:id,:idsalle)';
      $req = $db->prepare($q);
      $req->execute([
        'idsalle' => $idsalle,
        'aime' =>  1,
        'id' => $id
      ]);
    }
    $q = 'SELECT count(id) from avis where idsalle = :idsalle and aime = :aime';
    $req = $db->prepare($q);
    $req->execute([
      'idsalle' => $idsalle,
      'aime' => 1
    ]);
    $resultat = $req ->fetch(PDO::FETCH_ASSOC);
    $aime = $resultat['count(id)'];
    echo $aime;
  }elseif ($type == 'dislike') {
    $q = 'SELECT id from avis where idsalle = :idsalle and id_utilisateur = :id and aime_pas = :aime_pas';
    $req = $db->prepare($q);
    $req->execute([
      'idsalle' => $idsalle,
      'id' => $id,
      'aime_pas' => 1
    ]);
    if($req ->fetch(PDO::FETCH_ASSOC) >0){
      $anwser =1;
    }else {
      $anwser = 0;
    }
    if ($anwser == 1) { //si deja 1 like pour cette table par l'utilisateur
      $q = 'DELETE FROM avis where idsalle = :idsalle and id_utilisateur = :id';
      $req = $db->prepare($q);
      $req->execute([
        'idsalle' => $idsalle,
        'id' => $id
      ]);
    }else {
      $q = 'SELECT id from avis where idsalle = :idsalle and id_utilisateur = :id and aime = :aime';
      $req = $db->prepare($q);
      $req->execute([
        'idsalle' => $idsalle,
        'id' => $id,
        'aime' => 1
      ]);
      if($req ->fetch(PDO::FETCH_ASSOC) >0){
        $anwser =1;
      }else {
        $anwser = 0;
      }
      if ($anwser == 1) { //si deja 1 like pour cette table par l'utilisateur
        $q = 'DELETE FROM avis where idsalle = :idsalle and id_utilisateur = :id';
        $req = $db->prepare($q);
        $req->execute([
          'idsalle' => $idsalle,
          'id' => $id
        ]);
      }
      $q = 'INSERT INTO avis(aime_pas,id_utilisateur,idsalle)  VALUES(:aime_pas,:id,:idsalle)';
      $req = $db->prepare($q);
      $req->execute([
        'idsalle' => $idsalle,
        'aime_pas' =>  1,
        'id' => $id
      ]);
    }
    $q = 'SELECT count(id) from avis where idsalle = :idsalle and aime_pas = :aime_pas';
    $req = $db->prepare($q);
    $req->execute([
      'idsalle' => $idsalle,
      'aime_pas' => 1
    ]);
    $resultat = $req ->fetch(PDO::FETCH_ASSOC);
    $aime_pas = $resultat['count(id)'];
      echo $aime_pas;
  }
}else{
echo 'Vous devez être connecter pour faire cette action';
}
