<?php
    //=================================================================
    //                   CLASS OBJET - CLIENT
    //=================================================================
    class Devis extends DBObject implements JsonSerializable{
        private $_idDevis = 0;
        private $_categorieAppart = 0;      
        private $_statusLogement = 0;      
        private $_logementHabite = 0;              
        private $_typeLogement = 0;         
        private $_adresseNum = "";       
        private $_adresseRue = "";  
        private $_adresseVille = "";   
        private $_surface = 0;      
        private $_nbPieces = 0;     
        private $_surfaceDependances = 0;  
        private $_garage = 0; // boolean       
        private $_verandas = 0; // boolean  
        private $_alarme = 0; // boolean     
        private $_typeChauffage = 0;   
        private $_anneeConstruction = 0;    
        private $_nbSinitres = 0;   
        private $_resiliationRecente = 0;   
        private $_logementDejaAssure = 0;  // boolean    
        private $_dateAmenagementSouhaitee; // date   
        private $_dateDebutContratSouhaitee; // date 
        private $_montantMinSouhaite = 0; // double 
        private $_montatnMaxSouhaite = 0; // double  

        public function jsonSerialize()
        {
            $vars = get_object_vars($this);
    
            return $vars;
        }

        /**
         * Get the value of _surface
         */ 
        public function surface()
        {
                return $this->_surface;
        }

        /**
         * Set the value of _surface
         *
         * @return  self
         */ 
        public function set_surface($_surface)
        {
                $this->_surface = $_surface;

                return $this;
        }

        /**
         * Get the value of _idDevis
         */ 
        public function idDevis()
        {
                return $this->_idDevis;
        }

        /**
         * Set the value of _idDevis
         *
         * @return  self
         */ 
        public function set_idDevis($_idDevis)
        {
                $this->_idDevis = $_idDevis;

                return $this;
        }

        /**
         * Get the value of _categorieAppart
         */ 
        public function categorieAppart()
        {
                return $this->_categorieAppart;
        }

        /**
         * Set the value of _categorieAppart
         *
         * @return  self
         */ 
        public function set_categorieAppart($_categorieAppart)
        {
                $this->_categorieAppart = $_categorieAppart;

                return $this;
        }

        /**
         * Get the value of _statusLogement
         */ 
        public function statusLogement()
        {
                return $this->_statusLogement;
        }

        /**
         * Set the value of _statusLogement
         *
         * @return  self
         */ 
        public function set_statusLogement($_statusLogement)
        {
                $this->_statusLogement = $_statusLogement;

                return $this;
        }

        /**
         * Get the value of _logementHabite
         */ 
        public function logementHabite()
        {
                return $this->_logementHabite;
        }

        /**
         * Set the value of _logementHabite
         *
         * @return  self
         */ 
        public function set_logementHabite($_logementHabite)
        {
                $this->_logementHabite = $_logementHabite;

                return $this;
        }

        /**
         * Get the value of _typeLogement
         */ 
        public function typeLogement()
        {
                return $this->_typeLogement;
        }

        /**
         * Set the value of _typeLogement
         *
         * @return  self
         */ 
        public function set_typeLogement($_typeLogement)
        {
                $this->_typeLogement = $_typeLogement;

                return $this;
        }

        /**
         * Get the value of _adresseNum
         */ 
        public function adresseNum()
        {
                return $this->_adresseNum;
        }

        /**
         * Set the value of _adresseNum
         *
         * @return  self
         */ 
        public function set_adresseNum($_adresseNum)
        {
                $this->_adresseNum = $_adresseNum;

                return $this;
        }

        /**
         * Get the value of _adresseRue
         */ 
        public function adresseRue()
        {
                return $this->_adresseRue;
        }

        /**
         * Set the value of _adresseRue
         *
         * @return  self
         */ 
        public function set_adresseRue($_adresseRue)
        {
                $this->_adresseRue = $_adresseRue;

                return $this;
        }

        /**
         * Get the value of _adresseVille
         */ 
        public function adresseVille()
        {
                return $this->_adresseVille;
        }

        /**
         * Set the value of _adresseVille
         *
         * @return  self
         */ 
        public function set_adresseVille($_adresseVille)
        {
                $this->_adresseVille = $_adresseVille;

                return $this;
        }

        /**
         * Get the value of _nbPieces
         */ 
        public function nbPieces()
        {
                return $this->_nbPieces;
        }

        /**
         * Set the value of _nbPieces
         *
         * @return  self
         */ 
        public function set_nbPieces($_nbPieces)
        {
                $this->_nbPieces = $_nbPieces;

                return $this;
        }

        /**
         * Get the value of _surfaceDependances
         */ 
        public function surfaceDependances()
        {
                return $this->_surfaceDependances;
        }

        /**
         * Set the value of _surfaceDependances
         *
         * @return  self
         */ 
        public function set_surfaceDependances($_surfaceDependances)
        {
                $this->_surfaceDependances = $_surfaceDependances;

                return $this;
        }

        /**
         * Get the value of _garage
         */ 
        public function garage()
        {
                return $this->_garage;
        }

        /**
         * Set the value of _garage
         *
         * @return  self
         */ 
        public function set_garage($_garage)
        {
                $this->_garage = $_garage;

                return $this;
        }

        /**
         * Get the value of _verandas
         */ 
        public function verandas()
        {
                return $this->_verandas;
        }

        /**
         * Set the value of _verandas
         *
         * @return  self
         */ 
        public function set_verandas($_verandas)
        {
                $this->_verandas = $_verandas;

                return $this;
        }

        /**
         * Get the value of _alarme
         */ 
        public function alarme()
        {
                return $this->_alarme;
        }

        /**
         * Set the value of _alarme
         *
         * @return  self
         */ 
        public function set_alarme($_alarme)
        {
                $this->_alarme = $_alarme;

                return $this;
        }

        /**
         * Get the value of _typeChauffage
         */ 
        public function typeChauffage()
        {
                return $this->_typeChauffage;
        }

        /**
         * Set the value of _typeChauffage
         *
         * @return  self
         */ 
        public function set_typeChauffage($_typeChauffage)
        {
                $this->_typeChauffage = $_typeChauffage;

                return $this;
        }

        /**
         * Get the value of _anneeConstruction
         */ 
        public function anneeConstruction()
        {
                return $this->_anneeConstruction;
        }

        /**
         * Set the value of _anneeConstruction
         *
         * @return  self
         */ 
        public function set_anneeConstruction($_anneeConstruction)
        {
                $this->_anneeConstruction = $_anneeConstruction;

                return $this;
        }

        /**
         * Get the value of _nbSinitres
         */ 
        public function nbSinitres()
        {
                return $this->_nbSinitres;
        }

        /**
         * Set the value of _nbSinitres
         *
         * @return  self
         */ 
        public function set_nbSinitres($_nbSinitres)
        {
                $this->_nbSinitres = $_nbSinitres;

                return $this;
        }

        /**
         * Get the value of _resiliationRecente
         */ 
        public function resiliationRecente()
        {
                return $this->_resiliationRecente;
        }

        /**
         * Set the value of _resiliationRecente
         *
         * @return  self
         */ 
        public function set_resiliationRecente($_resiliationRecente)
        {
                $this->_resiliationRecente = $_resiliationRecente;

                return $this;
        }

        /**
         * Get the value of _logementDejaAssure
         */ 
        public function logementDejaAssure()
        {
                return $this->_logementDejaAssure;
        }

        /**
         * Set the value of _logementDejaAssure
         *
         * @return  self
         */ 
        public function set_logementDejaAssure($_logementDejaAssure)
        {
                $this->_logementDejaAssure = $_logementDejaAssure;

                return $this;
        }

        /**
         * Get the value of _dateDebutContratSouhaitee
         */ 
        public function dateDebutContratSouhaitee()
        {
                return $this->_dateDebutContratSouhaitee;
        }

        /**
         * Set the value of _dateDebutContratSouhaitee
         *
         * @return  self
         */ 
        public function set_dateDebutContratSouhaitee($_dateDebutContratSouhaitee)
        {
                $this->_dateDebutContratSouhaitee = $_dateDebutContratSouhaitee;

                return $this;
        }

        /**
         * Get the value of _montantMinSouhaite
         */ 
        public function montantMinSouhaite()
        {
                return $this->_montantMinSouhaite;
        }

        /**
         * Set the value of _montantMinSouhaite
         *
         * @return  self
         */ 
        public function set_montantMinSouhaite($_montantMinSouhaite)
        {
                $this->_montantMinSouhaite = $_montantMinSouhaite;

                return $this;
        }

        /**
         * Get the value of _montatnMaxSouhaite
         */ 
        public function montatnMaxSouhaite()
        {
                return $this->_montatnMaxSouhaite;
        }

        /**
         * Set the value of _montatnMaxSouhaite
         *
         * @return  self
         */ 
        public function set_montatnMaxSouhaite($_montatnMaxSouhaite)
        {
                $this->_montatnMaxSouhaite = $_montatnMaxSouhaite;

                return $this;
        }
    }

?>