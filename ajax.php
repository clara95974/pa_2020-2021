<?php
include('includes/db.php');

$mot_cle=$_GET['mot_cle'];
$q=
'SELECT * from questions where mot_cle = :mot_cle';
$req = $db -> prepare($q);
$req -> execute([
  'mot_cle' => $mot_cle

]);
$resultat = $req -> fetch( );


   if ($resultat ) {
     echo "<div class ='row les_réponses'  >  ";

     echo '<h3 class="col-12"  >'. $resultat['question'] .'</h3>'.
   '<p class="col-8"><strong>Description</strong> :</br>'. $resultat['reponse'].'</p>'.
       '<p class="col-4"><strong>mot clés:</strong> : '.  $resultat['mot_cle'] .'</p>';
     echo "</div>";
     echo "</div>";
   }else{
    echo "<p> Aucun résultat trouvé ... </p>";

   }
 ?>
