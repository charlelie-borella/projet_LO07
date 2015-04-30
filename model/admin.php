<?php
class admin {
	private $idAdmin;
	private $mail;
	
    function __construct($idAdmin, $mail) {
        $this->setIdAdmin($idAdmin);
        $this->setMail($mail);
    }

    function __toString() {
        return "Admin($this->getIdAdmin(), $this->getMail())<br/><\n";
    }
/* Les appels get */    
    function getIdAdmin() {
        return $this->idAdmin;
    }

    function getMail() {
        return $this->mail;
    }   

/* Les appels set */
    function setIdAdmin($idAdmin) {
        $this->idAdmin = $idAdmin;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }
}
