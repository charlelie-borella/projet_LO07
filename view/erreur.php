<?php 

function contenu($erreur){
	$html="";
	if($erreur == 1){
		$html.=<<<html
			<div id="body">
				<div class="alert alert-danger center_text" role="alert">
				  Erreur de connexion email ou mot de passe incorrect.<br>
				  <a href="connexion.php" class="alert-link">Retourner à la page de connexion</a> 
				</div>
			</div>
html;
	}
	
	return $html;
}