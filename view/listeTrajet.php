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

function trajet($active, $heure, $nbPlace, $prix, $idTrajet){

	$html=<<<html
		<tr><td>$heure
		<td>$nbPlace
			<td>$prix €			  	  
			<td>
html;
		if($active){
			$html.=<<<html
				<form action="reservationTraitement.php" method="POST">
				<button type='submit' class='btn btn-default'>Réserver</button>
				<input type="hidden" name="idTrajet" value="$idTrajet">				
				</form>
html;
		}
		else{
			$html.="<button type='submit' class='btn btn-default' disabled='disabled'>Complet</button>";
		}
	return $html;
}