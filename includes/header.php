<?php
session_start();
 ?>
<link rel="stylesheet" href="css/style.css">
<header class="h">
  <nav class="navbar navbar-expand-lg px-3">
                <img class="navbar-brand"src="image/Logo.jpg" alt="logo" height="100px " >
      </button>
           <div class=" navbar-collapse navbar-expand-lg justify-content-md-end " >
		<?php
		if((isset($_SESSION['email']) && !empty($_SESSION['email']))){
      echo "<a class='icone' href='page_perso.php'>".
      ' <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">'.
      '<path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>'.
      '</svg>' ."Mon compte".'</a>';
echo "<a  class='icone' href='deconnexion.php'>"."<svg xmlns='http://www.w3.org/2000/svg' width='50' height='50' fill='currentColor'
class='bi bi-box-arrow-right' viewBox='0 0 16 16'>"."
   <path fill-rule='evenodd' d='M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z'/>
   "."<path fill-rule='evenodd' d='M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z'/>"."
 </svg>"."</a>" ;
		}else{
                 echo '<a href="connexion.php" class="btn btn-co btn-lg my-4 scroll-smooth ">Se connecter</a>';
		}
		?>
              </div>

      </nav>
      <div class="container-fluid bienvnue">
          <div class="row justify-content-center">
              <div class="col-lg-12 col-sm-6 col-md-8 py-5">
                  <div class="bienvenue-main">
                      <div class="bienvenue-msg text-center text-white">
                          <h1 id="titre">Le Ministére du Mystére</h1>
                          <p class="container">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                          <a href="salles.php" class="btn btn-bienvenue btn-lg my-4 scroll-smooth " class="choix">Salles</a>
                            <a href="en_ligne.php" class="btn btn-bienvenue btn-lg my-4 scroll-smooth" class="choix">En ligne</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
</header>
