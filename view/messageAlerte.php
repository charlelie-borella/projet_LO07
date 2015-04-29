<?php 

function contenu($message){
	$html="";
	if($message == 0){
		$html.=<<<html
			<div id="body">
				<div class="alert alert-danger center_text" role="alert">
				  	Erreur<br>
				  <a href="index.php" class="alert-link">Retourner à l'accueil</a> 
				</div>
			</div>
html;
	}else if($message == 1){
		$html.=<<<html
			<div id="body">
				<div class="alert alert-danger center_text" role="alert">
				  	Erreur de connexion<br>
				  <a href="connexion.php" class="alert-link">Retourner à la page de connexion</a> 
				</div>
			</div>
html;
	}else if($message == 2){	
		$html.=<<<html
			<div id="body">
				<div class="alert alert-success center_text" role="alert">
				  Vous êtes connectés.<br>
				  <a href="index.php" class="alert-link">Effectuer une recherche</a> 
				</div>
			</div>
html;
	}

	else if($message == 3){		
		$html.=<<<html
			<div id="body">
				<div class="alert alert-warning center_text" role="alert">
				 Vous avez déjà une session d'ouverte<br>
				  <a href="index.php" class="alert-link">Effectuer une recherche</a> 
				</div>
			</div>
html;
	}

		else if($message == 4){		
		$html.=<<<html
			<div id="body">
				<div class="alert alert-info center_text" role="alert">
				 Vous êtes déconnectés.<br>
				  <a href="connexion.php" class="alert-link">Se connecter</a> 
				</div>
			</div>
html;
	}

		else if($message == 5){		
		$html.=<<<html
			<div id="body">
				<div class="alert alert-success center_text" role="alert">
				 Réservation effectuée<br>
				  <a href="index.php" class="alert-link">Accueil</a> 
				</div>
			</div>
html;
	}
	else if($message == 6){		
		$html.=<<<html
			<div id="body">
				<div class="alert alert-success center_text" role="alert">
				 Trajet enregistré<br>
				  <a href="index.php" class="alert-link">Accueil</a> 
				</div>
			</div>
html;
	}
	
	return $html;
}