<?php

//=================================================================
//                   CLASS OBJET - Contrat
//=================================================================
class Contrat extends DBOject{
    private $_idContrat = 0;
    private $_dateDebut;
    private $_dateFin;

    public function __clone() {
        parent::__clone();
    }

    public function setIdContrat($id)
    {
      // L'identifiant du personnage sera, quoi qu'il arrive, un nombre entier.
      $this->_idContrat = (int) $id;
    }
          
    public function setDateDebut($dateDebut)
    {
      // On effectue les controles de validité de la propriété (type de données, longueur, format ...)
      if (is_date($dateDebut) )
      {
        $this->dateDebut = $dateDebut;
      }
    }

    public function setPrenom($dateFin)
    {
      // On effectue les controles de validité de la propriété (type de données, longueur, format ...)
      if (is_date($dateFin) )
      {
        $this->_dateFin = $dateFin;
      }
    }

    public function idContrat() { return $this->_idContrat; }
    public function dateDebut() { return $this->_dateDebut; }
    public function dateFin() { return $this->_dateFin; }
}

?>