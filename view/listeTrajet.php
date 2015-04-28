<?php 

function deb($nbPlace, $villeDep, $villeAr){
	$html=<<<html
	<div id="body">
		<div id="listeTrajet">
			<h3 class="titre">$nbPlace covoiturage de $villeDep à $villeAr</h3>
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

function trajet($active, $heure, $nbPlace, $prix, $idTrajet, $idPassager){

	$html=<<<html
		<tr><td>$heure
		<td>$nbPlace
			<td>$prix €			  	  
			<td><form>
html;
		if($active){
			$html.=<<<html
				<form><button type='submit' class='btn btn-default'>Réserver</button>
				<input type="hidden" name="idTrajet" value="$idTrajet">
				<input type="hidden" name="idPassager" value="$idPassager">
				</form>
html;
		}
		else{
			$html.="<button type='submit' class='btn btn-default' disabled='disabled'>Complet</button>";
		}
	return $html;
}