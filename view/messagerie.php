<?php

//Page qui sert à gérer les messages échangés entre utilisateurs
function nav() {
$html=<<<html
<ul class="nav nav-tabs">
  <li role="presentation"><a href="profil.php">Votre Profil</a></li>
  <li role="presentation"><a href="annonces.php">Vos Annonces</a></li>
  <li role="presentation"><a href="reservations.php">Vos réservations</a></li>
  <li role="presentation" class="active"><a href="#">Messages</a></li>
</ul>

html;
	return $html;
}

function messageBox($idPassager){

	$html=<<<html
		<div class="panel panel-info">
		  <div class="panel-heading">
		    <h3 class="panel-title">Nouveau message</h3>
		  </div>
		  <div class="panel-body">
		  <form action="messagerieTraitement.php" method="POST">
  			<div class="form-group">
		   		<textarea name="message" class="form-control" rows="3"></textarea>		  
		    	<input type="hidden" name="idPassager" value=$idPassager></input>
		    </div>
			 	<button type="submit" class="btn btn-default">Envoyer</button>		
			</form>	
		  </div>
		</div>
html;

	return $html;
}
?>