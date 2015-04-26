<?php
class compte {
	private $idCompte;
	private $solde;
	
function __construct($idCompte, $solde) {
        echo "<pre>$idCompte, $solde</pre><br/>\n";
        $this->setIdCompte($idCompte);
        $this->setSolde($solde);
    }

    function __toString() {
        return "compte($this->getIdCompte(), $this->getSolde())<br/><\n";
    }
/* Les appels get */    
    function getIdCompte() {
        return $this->idCompte;
    }

    function getSolde() {
        return $this->solde;

/* Les appels set */
    function setIdCompte($idCompte) {
        $this->idCompte = $idCompte;
    }

    function setSolde($solde) {
        $this->solde = $solde;
    }

}
?>
