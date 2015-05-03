<?php 

function alerte($alerte, $message, $link, $messageRedictions){

	$html="<div id='body'>";
	switch ($alerte) {
		case '0':
			$html.="<div class='alert alert-success center_text' role='alert'>";
			break;
		case '1':
			$html.="<div class='alert alert-info center_text' role='alert'>";
		break;
		case '2':
			$html.="<div class='alert alert-warning center_text' role='alert'>";
		break;
		case '3':
			$html.="<div class='alert alert-danger center_text' role='alert'>";
		break;			
		default:
			$html.="<div class='alert center_text' role='alert'>";
			break;
	}

	$html.= $message;
	$html.= "<a href='" . $link . "' class='alert-link'>" . $messageRediction ."</a>";
	$html.="</div>";
	$html.="</div>";
}

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
	else if($message == 7){		
		$html.=<<<html
			<div id="body">
				<div class="alert alert-success center_text" role="alert">
				 Véhicule enregistré<br>
				  <a href="index.php" class="alert-link">Accueil</a> 
				</div>
			</div>
html;
	}
	else if($message == 8){		
		$html.=<<<html
			<div id="body">
				<div class="alert alert-danger center_text" role="alert">
				 Vous n'avez pas de véhicule d'enregistré<br>
				  <a href="formulaireVehicule.php" class="alert-link">Enregistrer un véhicule</a> 
				</div>
			</div>
html;
	}
	else if($message == 9){		
		$html.=<<<html
			<div id="body">
				<div class="alert alert-success center_text" role="alert">
				 Commentaire enregistré.<br>
				  <a href="profil.php" class="alert-link">Retourner au profil</a> 
				</div>
			</div>
html;
	}
	
	else if($message == 10){		
		$html.=<<<html
			<div id="body">
				<div class="alert alert-success center_text" role="alert">
				 Inscription enregistré.<br>
				  <a href="profil.php" class="alert-link">Retourner au profil</a> 
				</div>
			</div>
html;
	}

	return $html;
}