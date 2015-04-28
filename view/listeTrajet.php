<?php 

function deb($nbPlace, $villeDep, $villeAr){
	$html=<<<html
	<div id="body">
		<h3 class="titre">$nbPlace covoiturage de $villeDep à $villeAr</h3>
		<div id="trajet">
			<table class="table">
			<tr>
			    <th>Horaire</th>
			    <th>Places disponibles</th> 
			    <th>Prix</th>
			</tr>
html;
	return $html;
}

function fin(){
	$html=<<<html
			</table>
		</div>
	</div>
html;
	return $html;
}

function trajet($heure, $nbPlace, $prix){

		$html=<<<html
			  <tr><td>$heure
			  	  <td>$nbPlace
			  	  <td>$prix €	
html;
		
	return $html;
}

