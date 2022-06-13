<?php
session_start();
$horaire=9;
$days = [' ',' Lundi ',' Mardi ',' Mercredi ',' Jeudi ',' Vendredi ',' Samedi ',' Dimanche '];
$div = $_GET['div'];
$idsalle =$_GET['id'];

include('includes/db.php');
$idsalle = 1;
$q = 'SELECT date_commande, nb_commande from reserver where idsalle = :idsalle';
$req = $db->prepare($q);
$req->execute([
  'idsalle' => $idsalle
]);
$resultat = $req ->fetchAll();
date_default_timezone_set('Europe/Paris');
$date = date('l d/m/Y H:i:s');
 if(isset($resultat[0]['date_commande'])){
   $datetest = $resultat[0]['date_commande'];
  //$resultat1= date_format($datetest,'d/m/Y H:i:s') ;
  $resultat1= date_create_from_format('Y-m-d H:i:s',$datetest)->format('d/m/Y H:i:s');
  $fdate = explode(' ',$date);
  $day = $fdate[0];
  switch ($day) {
    case 'Monday':
      $day ='Lundi';
      break;
    case 'Tuesday':
      $day ='Mardi';
      break;
    case 'Wednesday':
        $day ='Mercredi';
        break;
    case 'Thursday':
          $day ='Jeudi';
          break;
    case 'Saturday':
          $day ='Samedi';
          break;
    case 'Sunday':
          $day ='Dimanche';
          break;
  }
 }
echo '<table>';
for ($i=0; $i < 8 ; $i++) {
  echo '<th>';
  echo $days[$i];
  echo '</th>';
}
for ($j=0; $j < 16; $j++) {
    echo '<tr>';
    echo "<td>$horaire h</td>";
    for ($k=0; $k < 7; $k++) {
      echo '<td>';
      if (!isset($resultat1)) {
        echo "<input type='button' value='indisponible' style='background-color: grey'>";
      }else {
       echo "<input type='button' value='disponible' id='slot$j$k' onclick='status($j,$k,$idsalle,$div)' style='background-color: green'>";
      }
      echo '</td>';
    }
    echo '<td>';
    echo '</td>';
    echo '</tr>';
    $horaire++;
  }
echo '</table>';
 ?>
