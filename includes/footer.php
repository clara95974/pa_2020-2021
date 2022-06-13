<script src="script.js"  charset="utf-8"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<footer>
<div class="container-fluid">
  <div class="row">
    <div class="col-md4">
      <?php
      if(file_exists('compteur2.txt'))
      {
              $compteur_f = fopen('compteur2.txt', 'r+');
              $compte = fgets($compteur_f);
      }
      else
      {
              $compteur_f = fopen('compteur2.txt', 'a+');
              $compte = 0;
      }
      if(!isset($_SESSION['compteur2']))
      {
              $_SESSION['compteur2'] = 'visite';
              $compte++;
              fseek($compteur_f, 0);
              fputs($compteur_f, $compte);
      }
      fclose($compteur_f);
      echo '<strong>'.$compte.'</strong> visites.';
      ?>
    </div>
    <div class="col-md4">
      <h3 >
          &copy;Le ministére du mystére 💂 <?php echo date('Y') ?> <?php echo date('Y') ?>
      </h3>
    </div>
  </div>
  </div>
</footer>
