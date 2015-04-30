<?php

function navBar($page){
	$html= "<div id='body'>";
	$html.="<ul class='nav nav-tabs'>";
	if($page=="gestionTrajetAdministration.php"){
		$html.="<li role='presentation' class='active'><a href='gestionTrajetAdministration.php'>Trajet à venir</a></li>";
	}
	else{
		$html.="<li role='presentation'><a href='gestionTrajetAdministration.php'>Trajet à venir</a></li>";
	}
	if($page=="gestionTrajetHistoriqueAdministration.php"){
		$html.="<li role='presentation' class='active'><a href='gestionTrajetHistoriqueAdministration.php'>Trajets passés</a></li>";
	}
	else{
		$html.="<li role='presentation'><a href='gestionTrajetHistoriqueAdministration.php'>Trajets passés</a></li>";
	}
	$html.="</ul>";
	return $html;
}

function deb(){
	$html=<<<html
			<div id="trajet">	
				<table class="table">
				<tr>
				    <th>Id trajet
				    <th>date</th>
				    <th>Ville départ
				    <th>Ville d'arrivée
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

function trajet($idTrajet, $date, $villeDep, $villeAr, $place, $prix, $idConducteur){

	$html=<<<html
		<tr><td>$idTrajet
			<td>$date
			<td>$villeDep 		  	  
			<td>$villeAr
			<td>$place
			<td>$prix
			<td><form action="descriptifVoyageAdministration.php" method="POST">
				<input type="hidden" name="idTrajet" value=$idTrajet>
				<input type="hidden" name="date" value=$date>
				<input type="hidden" name="villeDep" value=$villeDep>
				<input type="hidden" name="villeAr" value=$villeAr>
				<input type="hidden" name="idConducteur" value=$idConducteur>
				<button type="submit" class="btn btn-primary button-with-min">Descriptif</button>
			</form>
html;

	return $html;
}