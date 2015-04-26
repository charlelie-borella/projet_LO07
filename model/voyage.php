<?php
class voyage {
	private $idVoyage;
	private $idTrajet;
	private $idPassager;
	private $commentaireID;
	private $messageID; 


function __construct($idVoyage, $idTrajet, $idPassager, $commentaireID, $messageID) {
        echo "<pre>$idVoyage, $idTrajet, $idPassager, $commentaireID, $messageID</pre><br/>\n";
        $this->setIdVoyage($idVoyage);
        $this->setIdTrajet($idTrajet);
        $this->setIdPassager($idPassager);
        $this->setCommentaireID($commentaireID);
        $this->setMessageID($messageID);

    }

    function __toString() {
        return "voyage($this->getIdVoyage(), $this->getIdVoyage(), $this->getIdPassager(), $this->getCommentaireID(), $this->getMessageID() )<br/><\n";
    }
/* Les appels get */    
    function getIdVoyage() {
        return $this->idVoyage;
    }

    function getIdTrajet() {
        return $this->idTrajet;
    }

    function getIdPassager() {
        return $this->idPassager;
    }

    function getCommentaireID() {
        return $this->commentaireID;
    }

    function getMessageID() {
        return $this->messageID;
    }

/* Les appels set */
    function setIdVoyage($idVoyage) {
        $this->idVoyage = $idVoyage;
    }

    function setIdTrajet($idTrajet) {
        $this->idTrajet = $idTrajet;
    }

    function setIdPassager($idPassager) {
        $this->idPassager = $idPassager;
    }

    function setCommentaireID($commentaireID) {
        $this->commentaireID = $commentaireID;
    }
    function setMessageID($messageID) {
        $this->messageID = $messageID;
    }

}
?>