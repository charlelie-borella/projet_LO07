<?php
class commmentaire {
	private $idCommentaire;
	private $noteConduite;
	private $noteParcours;
	private $commentaire;
	private $date; 


function __construct($idCommentaire, $noteConduite, $noteParcours, $commentaire, $date) {
        echo "<pre>$idCommentaire, $noteConduite, $noteParcours, $commentaire, $date</pre><br/>\n";
        $this->setIdComentaire($idCommentaire);
        $this->setNoteConduite($noteConduite);
        $this->setNoteParcours($noteParcours);
        $this->setCommentaire($commentaire);
        $this->setDate($date);

    }

    function __toString() {
        return "commentaire($this->getIdCommentaire(), $this->getNoteConduite(), $this->getNoteParcours(), $this->getCommentaire(), $this->getDate() )<br/><\n";
    }
/* Les appels get */    
    function getIdCommentaire() {
        return $this->idCommentaire;
    }

    function getNoteConduite() {
        return $this->noteConduite;
    }

    function getNoteParcours() {
        return $this->noteParcours;
    }

    function getCommentaire() {
        return $this->commentaire;
    }

    function getDate() {
        return $this->date;
    }

/* Les appels set */
    function setIdComentaire($idCommentaire) {
        $this->idCommentaire = $idCommentaire;
    }

    function setNoteConduite($noteConduite) {
        $this->noteConduite = $noteConduite;
    }

    function setNoteParcours($noteParcours) {
        $this->noteParcours = $noteParcours;
    }

    function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }
    function setDate($date) {
        $this->date = $date;
    }

}
?>