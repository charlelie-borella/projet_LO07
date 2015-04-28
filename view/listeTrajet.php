<?php 

function deb(){
	$html=<<<html
		<div id="trajet">
			<table class="table">
html;
	return $html;
}

function fin(){
	$html=<<<html
			</table>
		</div>	
html;
	return $html;
}

function trajet(){
	$html=<<<html
		
			  <tr><td>
	
html;
	return $html;
}
