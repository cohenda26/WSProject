<?php

//=================================================================
//                   CLASS OBJET - Courtier
//=================================================================
class Courtier extends DBObject{
    private $_idCourtier = 0;
    private $_nom = "";
    private $_numEssek = "";
    private $_ville = "";
    private $_rue = "";
    private $_numero = "";
    private $_telephone = "";

    public function __clone() {
        parent::__clone();
    }

    public function setIdCourtier($id)
    {
      // L'identifiant du personnage sera, quoi qu'il arrive, un nombre entier.
      $this->_idCourtier = (int) $id;
    }
          
    public function setNom($nom)
    {
      // On effectue les controles de validité de la propriété (type de données, longueur, format ...)
      if (is_string($nom) && strlen($nom) <= 30)
      {
        $this->_nom = $nom;
      }
    }

    public function setNumEssek($numEssek)
    {
      // On effectue les controles de validité de la propriété (type de données, longueur, format ...)
      if (is_string($numEssek) && strlen($numEssek) <= 11)
      {
        $this->_numEssek = $numEssek;
      }
    }

    public function setVille($ville){
      if (is_string($ville) && strlen($ville) <= 30)
      {
        $this->_ville = $ville;
      }      
    }
    public function setRue($rue){
      if (is_string($rue) && strlen($rue) <= 30)
      {
        $this->_rue = $rue;
      }      
    }
    public function setNumero($numero){
      if (is_string($numero) )
      {
        $this->_numero = $numero;
      }      
    }
    public function setTelephone($telephone){
      if (is_string($telephone) && strlen($telephone) <= 30)
      {
        $this->_telephone = $telephone;
      }      
    }


    public function idCourtier() { return $this->_idCourtier; }
    public function nom() { return $this->_nom; }
    public function numEssek() { return $this->_numEssek; }
    public function ville(){return $this->_ville; }
    public function rue(){return $this->_rue; }
    public function numero(){return $this->_numero; }
    public function telephone(){return $this->_telephone; }
}

?>