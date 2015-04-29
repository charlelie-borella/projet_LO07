<?php 

function deb($date, $nbPlace, $villeDep, $villeAr){
	$html=<<<html
	<div id="body">
		<div id="listeTrajet">
			<h3 class="titre">$nbPlace covoiturage de $villeDep à $villeAr le $date</h3>
			<div id="trajet">	
				<table class="table">
				<tr>
				    <th>Horaire</th>
				    <th>Places disponibles</th> 
				    <th>Prix</th>
				    <th></th>
				</tr>
html;
	return $html;
}

function fin(){
	$html=<<<html
				</table>
			</div>
		</div>
	</div>
html;
	return $html;
}

//Active = est-ce qu'il y a encore de la place ou pas
function trajet($active, $heure, $nbPlace, $prix, $idTrajet, $idConducteur){

	$html=<<<html
		<tr><td>$heure
		<td>$nbPlace
			<td>$prix €			  	  
			<td>
html;
	if(isset($_SESSION['membre'])){


		if($_SESSION['membre']->getIdMembre() == $idConducteur )
		{
			$html.=<<<html
					<button disabled="disabled" type="button" class="btn btn-warning button-with-min">Votre trajet</button>
html;
		}
		else{
			if($active){
				$html.=<<<html
					<form action="reservationTraitement.php" method="POST">
					<button type='submit' class='btn btn-primary button-with-min'>Réserver</button>
					<input type="hidden" name="idTrajet" value="$idTrajet">				
					</form>	
html;
			}
			else{
				$html.="<button type='submit' class='btn btn-danger button-with-min' disabled='disabled'>Complet</button>";
			}
		}
	}else{
		$html.="<a href='connexion.php' class='btn btn-danger button-with-min' role='button'>Se connecter</a></p>";
	}
	return $html;
}