<?php
    //=================================================================
    //                   CLASS OBJET - CLIENT
    //=================================================================
    class Client extends DBObject implements JsonSerializable{
        private $_idClient = 0;
        private $_nom = "";
        private $_prenom = "";
        private $_telephone;
        private $_teoudatZeout;
        private $_civilite;
        private $_dateNaissance;

        public function jsonSerialize()
        {
            $vars = get_object_vars($this);
    
            return $vars;
        }
    
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
        //   $appartementManager = AppartementManager::getNewInstance();
        //   return  $appartementManager->getListFromClient($this->idClient());
        // }


        /**
         * Get the value of _teoudatZeout
         */ 
        public function teoudatZeout()
        {
                return $this->_teoudatZeout;
        }

        /**
         * Set the value of _teoudatZeout
         *
         * @return  self
         */ 
        public function setTeoudatZeout($_teoudatZeout)
        {
                $this->_teoudatZeout = $_teoudatZeout;

                return $this;
        }

        /**
         * Get the value of _civilite
         */ 
        public function civilite()
        {
                return $this->_civilite;
        }

        /**
         * Set the value of _civilite
         *
         * @return  self
         */ 
        public function setCivilite($_civilite)
        {
                $this->_civilite = $_civilite;

                return $this;
        }

        /**
         * Get the value of _dateNaissance
         */ 
        public function getDateNaissance()
        {
                return $this->_dateNaissance;
        }

        /**
         * Set the value of _dateNaissance
         *
         * @return  self
         */ 
        public function dateNaissance($_dateNaissance)
        {
                $this->_dateNaissance = $_dateNaissance;

                return $this;
        }
    }

?>