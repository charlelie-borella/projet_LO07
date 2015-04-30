<?php 
//Messages d'alertes au cas où il y ait une erreur sur le site.
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
//Si l'utilisateur rentre mal son identifiant et/ou son mdp : 
	}else if($message == 1){
		$html.=<<<html
			<div id="body">
				<div class="alert alert-danger center_text" role="alert">
				  	Erreur de connexion<br>
				  <a href="connexion.php" class="alert-link">Retourner à la page de connexion</a> 
				</div>
			</div>
html;
//SI l'utilsateur se connecte sur le site :  
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
//SI l'utilisateur rentre mal son identifiant et/ou son mdp : 
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
// SI l'utilisateur se déconnecte du site : 
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
//SI l'utilisateur fait une reservation sur le site (redirection vers l'acceuil)
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
//SI l'utilisateur ajoute un trajet où il est le conducteur : 
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