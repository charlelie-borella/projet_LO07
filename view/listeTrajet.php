<?php 
//Page permet d'afficher l'ensemble des covoiturages qui répondent à la demande de l'utilisateur.

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//
//Affichage d'un trajet qui correspond à la date, ville arrivée et ville de départ recherché.
function deb($date, $nbPlace, $villeDep, $villeAr){
	$html=<<<html
	<div id="body">
		<div id="listeTrajet">
			<h3 class="titre">$nbPlace covoiturage(s) de $villeDep à $villeAr le $date</h3>
			<div id="trajet">	
				<table class="table">
				<tr>
				    <th>Horaire(s)</th>
				    <th>Place(s) disponible(s)</th> 
				    <th>Prix</th>
				    <th style='width: 60px'></th>
				    <th></th>
				</tr>
html;
	return $html;
}

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//
//Fonction qui permet de fermer les baslises html
function fin(){
	$html=<<<html
				</table>
			</div>
		</div>
	</div>
html;
	return $html;
}

// _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
//
//Fonction qui vérifie que le nombre de places encore disponibles pour le trajet.
function trajet($active, $heure, $nbPlace, $nbPlaceDisponible, $prix, $idTrajet, $idConducteur){

	$html=<<<html
		<tr><td>$heure
			<td>$nbPlace
			<td>$prix €			  	  
html;
// SI l'utilisateur est connecté : 
	if(isset($_SESSION['membre'])){
		// SI l'utilsisateur a le même ID que le conducteur du trajet, ALORS le bouton se met en rouge avec écrit "Votre trajet"
		// L'utilsateur ne peut alors s'inscrire au trajet.

		if($_SESSION['membre']->getIdMembre() == $idConducteur )
		{
			$html.=<<<html
					<td style='width: 100px'></td>
					<td><button disabled="disabled" type="button" class="btn btn-warning button-with-min">Votre trajet</button></td>
html;
		}
		// SINON l'on regarde s'il y a encore des places libres pour le trajet.
		else{
			// SI il y a des palces, ALORS l'utilisateur peut s'inscrire.
			if($active){
				$html.=<<<html
					<form action="reservationTraitement.php" method="POST">
					<td style='width: 60px'><select name="nbPlaces" class="form-control" style='width: 60px'>
html;
				for ($i=1; $i <= $nbPlaceDisponible; $i++) { 
					$html.= "<option value=$i>$i</option>";
				}
				$html.=<<<html
					</select></td>
					<td style='width: 60px'><button type='submit' class='btn btn-primary button-with-min'>Réserver</button></td>
					<input type="hidden" name="idTrajet" value="$idTrajet">				
					</form>	
html;
			}
			//SINON le bouton est déssactivé et il est écrit "COMPLET"
			else{
				$html.="<td style='width: 60px'></td>";
				$html.="<td style='width: 100px'><button type='submit' class='btn btn-danger button-with-min' disabled='disabled' >Complet</button></td>";
			}
		}
	}else
	// SI l'utilisateur n'est pas connecté : 
	{
		$html.="<a href='connexion.php' class='btn btn-danger button-with-min' role='button'>Se connecter</a></p>";
	}
	return $html;
}