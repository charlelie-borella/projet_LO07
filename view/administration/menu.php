<?php

function menu($page=""){

	$html=<<<html
	<nav class="navbar navbar-default">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand">Administration</a>
              </div>
            
html;

  if(isset($_SESSION['admin'])){
      $html.=<<<html
         <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
html;
            if($page == "gestionCompteAdministration.php"){
              $html.="<li class='active'><a href='gestionCompteAdministration.php'>Gestion comptes</a></li>";
            }
            else{
              $html.="<li><a href='gestionCompteAdministration.php'>Gestion comptes</a></li>";
            }
            if($page == "gestionTrajetAdministration.php" || $page == "gestionTrajetHistoriqueAdministration.php") {
              $html.="<li class='active'><a href='gestionTrajetAdministration.php'>Gestion trajets</a></li>";
            }
            else{
               $html.="<li><a href='gestionTrajetAdministration.php'>Gestion trajets</a></li>";
            }
                
      $html.=<<<html
              </ul>

              <ul class="nav navbar-nav navbar-right">
              <li><a href='deconnexionAdministration.php'>Se déconnecter</a></li>
html;
          $html.=<<<html
               </ul>              
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
html;

  }
  else{
    $html.=<<<html
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">          
              </ul>
              <ul class="nav navbar-nav navbar-right">            
                
                <li><a href="deconnexion.php">Se deconnecter</a></li>            
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->   
html;
  }

  $html.="</nav>";
	return $html;
}