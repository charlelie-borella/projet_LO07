<?php

function menu(){

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
              <a class="navbar-brand" href="index.php">Covoiturage</a>
              </div>
            
html;

  if(isset($_SESSION['membre'])){
      $html.=<<<html
         <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">              
                <li><a href="creationTrajet.php">Proposer un trajet</a></li>
              </ul>
              <ul class="nav navbar-nav">          
              </ul>
              <ul class="nav navbar-nav navbar-right">           
                <li><a href="profil.php">Profil</a></li>
                <li><a href="deconnexion.php">Se déconnecter</a></li>            
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
                <li><a href="inscription.php">S'inscrire</a></li>
                <li><a href="connexion.php">Se connecter</a></li>            
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->   
html;
  }

  $html.="</nav>";
	return $html;
}