
<?php
class vehicule {
	private $idVehicule;
	private $nbPlace;
	private $marque;
	private $modele;
	private $photo_vehicule; 
	private $confort;
/*ce serait peut être mieux de mettre vehicule au lien de voiture 
=> il y a voiture dans le BD*/


function __construct($idVehicule, $nbPlace, $marque, $modele, $photo_vehicule, $confort) {
        echo "<pre>$idVehicule, $nbPlace, $marque, $modele, $photo_vehicule, $confort</pre><br/>\n";
        $this->setIdVehicule($idVehicule);
        $this->setNbPlace($nbPlace);
        $this->setMarque($maque);
        $this->setModele($modele);
        $this->setPhoto_vehicule($photo_vehicule);
        $this->setConfort($confort);
    }

    function __toString() {
        return "vehicule($this->getIdVehicule(), $this->getNbPlace(), $this->getMarque(), $this->getModele(), $this->getPhoto_voiture(), $this->getConfort() )<br/><\n";
    }
/* Les appels get */    
    function getIdVehicule() {
        return $this->idVehicule;
    }

    function getNbPlace() {
        return $this->nbPlace;
    }

    function getMarque() {
        return $this->marque;
    }

    function getModele() {
        return $this->modele;
    }

    function getPhoto_voiture() {
        return $this->photo_vehicule;
    }

    function getConfort() {
        return $this->confort;
    }
/* Les appels set */
    function setIdVehicule($idVehicule) {
        $this->idVehicule = $idVehicule;
    }

    function setNbPlace($nbPlace) {
        $this->nbPlace = $nbPlace;
    }
    function setMarque($marque) {
        $this->marque = $marque;
    }

    function setModele($modele) {
        $this->modele = $modele;
    }
    function setPhoto_vehicule($photo_vehicule) {
        $this->photo_vehicule = $photo_vehicule;
    }

    function setConfort($confort) {
        $this->confort = $confort;
    }

}
?>