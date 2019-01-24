<?php
    //=================================================================
    //                   CLASS OBJET - CLIENT
    //=================================================================
    class Client extends DBObject{
        private $_idClient = 0;
        private $_nom = "";
        private $_prenom = "";
        private $_telephone;

        public function __clone() {
            parent::__clone();
        }

        public function setIdClient($id)
        {
          // L'identifiant du personnage sera, quoi qu'il arrive, un nombre entier.
          $this->_idClient = (int) $id;
        }
              
        public function setNom($nom)
        {
          // On effectue les controles de validité de la propriété (type de données, longueur, format ...)
          if (is_string($nom) && strlen($nom) <= 30)
          {
            $this->_nom = $nom;
          }
        }

        public function setPrenom($prenom)
        {
          // On effectue les controles de validité de la propriété (type de données, longueur, format ...)
          if (is_string($prenom) && strlen($prenom) <= 30)
          {
            $this->_prenom = $prenom;
          }
        }

        public function setTelephone($telephone)
        {
            $this->_telephone = $telephone;
        }

        public function idClient() { return $this->_idClient; }
        public function nom() { return $this->_nom; }
        public function prenom() { return $this->_prenom; }
        public function telephone() { return $this->_telephone; }

        // public function getListAppartements(){
        //   $appartementManager = new AppartementManager(DBConnexion::getInstanceConnection());
        //   return  $appartementManager->getListFromClient($this->idClient());
        // }

    }

?>