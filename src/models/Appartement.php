<?php

//=================================================================
//                   CLASS OBJET - Appartement
//=================================================================
class Appartement extends DBOject{
    private $_idAppartement = 0;
    private $_ville = "";
    private $_rue = "";
    private $_numero = "";
    private $_idClient=0; // Clef étrangère de la table client


    public function __clone() {
        parent::__clone();
    }

    public function setIdAppartement($id)
    {
      // L'identifiant du personnage sera, quoi qu'il arrive, un nombre entier.
      $this->_idAppartement = (int) $id;
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
    public function setIdClient($idClient){
      if (is_int($idClient) )
      {
        $this->_idClient = $idClient;
      }      
    }
    public function idAppartement() { return $this->_idAppartement; }
    public function ville(){return $this->_ville; }
    public function rue(){return $this->_rue; }
    public function numero(){return $this->_numero; }
    public function idClient(){return $this->_idClient; }
}

?>