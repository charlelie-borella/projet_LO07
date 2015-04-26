<?php
class messagevoyage {
	private $idMessage;
	private $propietaireID;
	private $destinataireID;
	private $message;
	private $dateMessage; 


function __construct($idMessage, $propietaireID, $destinataireID, $message, $dateMessage) {
        echo "<pre>$idMessage, $propietaireID, $destinataireID, $message, $dateMessage</pre><br/>\n";
        $this->setIdMessage($idMessage);
        $this->setProprietaireID($propietaireID);
        $this->setDestinataireID($destinataireID);
        $this->setMessage($message);
        $this->setDatemessage($dateMessage);

    }

    function __toString() {
        return "messagevoyage($this->getIdMessage(), $this->getProprietaireID(), $this->getDestinataireID(), $this->getMessage(), $this->getDateMessage() )<br/><\n";
    }
/* Les appels get */    
    function getIdMessage() {
        return $this->idMessage;
    }

    function getProprietaireID() {
        return $this->propietaireID;
    }

    function getDestinataireID() {
        return $this->destinataireID;
    }

    function getMessage() {
        return $this->message;
    }

    function getDateMessage() {
        return $this->dateMessage;
    }

/* Les appels set */
    function setIdMessage($idMessage) {
        $this->idMessage = $idMessage;
    }

    function setProprietaireID($propietaireID) {
        $this->propietaireID = $propietaireID;
    }

    function setDestinataireID($destinataireID) {
        $this->destinataireID = $destinataireID;
    }

    function setMessage($message) {
        $this->message = $message;
    }
    function setDateMessage($dateMessage) {
        $this->dateMessage = $dateMessage;
    }

}
?>