<?php
class membre {
	private $idMembre;
    private $nom;
	private $prnom;
	private $password;
	private $adresse;
	private $cp; 
    private $ville;
    private $pays; 
    private $tel;
    private $mail;
    private $note;
    private $photoProfil;
    private $dateNais;
    private $vehiculeID; 
    private $compteID; 


function __construct($idMembre, $nom, $prnom, $password, $adresse, $cp, $ville, $pays, $tel, $mail, $note, $photoProfil, $dateNais, $vehiculeID, $compteID) {
        echo "<pre>$idMembre, $nom, $prnom, $password, $adresse, $cp, $ville, $pays, $tel, $mail, $note, $photoProfil, $dateNais, $vehiculeID, $compteID</pre><br/>\n";
        $this->setIdMembre($idMembre);
        $this->setNom($nom);
        $this->setPrnom($prnom);
        $this->setPassword($password);
        $this->setAdresse($adresse);
        $this->setCp($cp);
        $this->setVille($ville);
        $this->setPays($pays);
        $this->setTel($tel);
        $this->setMail($mail);
        $this->setNote($note);
        $this->setPhotoProfil($photoProfil);
        $this->setDateNais($dateNais);
        $this->setVehiculeID($vehiculeID);
        $this->setCompteID($compteID);

    }

    function __toString() {
        return "membre($this->getIdMembre(), $this->getNom(), $this->getPrnom(), $this->getPassword(), $this->getAdresse(), $this->getCp(), $this->getVille(), $this->getPays, 
            $this->getTel(), $this->getMail(), $this->getNote(), $this->getPhotoProfil(), $this->getDateNais(), $this->getVehiculeID(), $this->getCompteID() )<br/><\n";
    }
/* Les appels get */    
    function getIdMembre() {
        return $this->idMembre;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrnom() {
        return $this->prnom;
    }

    function getPassword() {
        return $this->password;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getCp() {
        return $this->cp;
    }

    function getVille() {
        return $this->ville;
    }

    function getPays() {
        return $this->pays;
    }

    function getTel() {
        return $this->tel;
    }

    function getMail() {
        return $this->mail;
    }

    function getNote() {
        return $this->note;
    }

    function getPhotoProfil() {
        return $this->photoProfil;
    }

    function getDateNais() {
        return $this->dateNais;
    }

    function getVehiculeID() {
        return $this->vehiculeID;
    }

    function getCompteID() {
        return $this->compteID;
    }
/* Les appels set */
    function setIdMembre($idMembre) {
        $this->idMembre = $idMembre;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrnom($prnom) {
        $this->prnom = $prnom;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function setCp($cp) {
        $this->cp = $cp;
    }

    function setVille($ville) {
        $this->ville = $ville;
    }
    
    function setPays($pays) {
        $this->pays = $pays;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

    function setNote($note) {
        $this->note = $note;
    }

    function setPhotoProfil($photoProfil) {
        $this->photoProfil = $photoProfil;
    }

    function setDateNais($dateNais) {
        $this->dateNais = $dateNais;
    }

    function setVehiculeID($vehiculeID) {
        $this->vehiculeID = $vehiculeID;
    }
    
    function setCompteID($compteID) {
        $this->compteID = $compteID;
    }
}
?>