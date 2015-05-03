<?php
//Foot => identique & inclu à toutes les pages 
function foot(){

	$html=<<<html

		<div id="foot">
            <p><span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span> Covoiturage 2015</p>
        </div>
		</div>	    
	  </body>
	</html>
html;
	return $html;
}