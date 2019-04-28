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
        private $_devisAdresseNum = "";       
        private $_devisAdresseRue = "";  
        private $_devisAdresseVille = "";   
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
        private $_montantMaxSouhaite = 0; // double  
        private $_valeurMobilier = 0;
        private $_idClient;
        private $_status;

        public function jsonSerialize()
        {
            $vars = get_object_vars($this);
    
            return $vars;
        }

        public function surface()
        {
                return $this->_surface;
        }

        public function setSurface($_surface)
        {
                $this->_surface = $_surface;

                return $this;
        }

        public function idDevis()
        {
                return $this->_idDevis;
        }

        public function setIdDevis($_idDevis)
        {
                $this->_idDevis = $_idDevis;

                return $this;
        }

 
        public function categorieAppart()
        {
                return $this->_categorieAppart;
        }

        public function setCategorieAppart($_categorieAppart)
        {
                $this->_categorieAppart = $_categorieAppart;

                return $this;
        }

        public function statusLogement()
        {
                return $this->_statusLogement;
        }

        public function setStatusLogement($_statusLogement)
        {
                $this->_statusLogement = $_statusLogement;

                return $this;
        }

        public function logementHabite()
        {
                return $this->_logementHabite;
        }


        public function setLogementHabite($_logementHabite)
        {
                $this->_logementHabite = $_logementHabite;

                return $this;
        }

        public function typeLogement()
        {
                return $this->_typeLogement;
        }

        public function setTypeLogement($_typeLogement)
        {
                $this->_typeLogement = $_typeLogement;

                return $this;
        }

        public function devisAdresseNum()
        {
                return $this->_devisAdresseNum;
        }

        public function setDevisAdresseNum($_devisAdresseNum)
        {
                $this->_devisAdresseNum = $_devisAdresseNum;

                return $this;
        }

        public function devisAdresseRue()
        {
                return $this->_devisAdresseRue;
        }

        public function setDevisAdresseRue($_devisAdresseRue)
        {
                $this->_devisAdresseRue = $_devisAdresseRue;

                return $this;
        }

        public function devisAdresseVille()
        {
                return $this->_devisAdresseVille;
        }

        public function setDevisAdresseVille($_devisAdresseVille)
        {
                $this->_devisAdresseVille = $_devisAdresseVille;

                return $this;
        }

        public function nbPieces()
        {
                return $this->_nbPieces;
        }

        public function setNbPieces($_nbPieces)
        {
                $this->_nbPieces = $_nbPieces;

                return $this;
        }

        public function surfaceDependances()
        {
                return $this->_surfaceDependances;
        }

        public function setSurfaceDependances($_surfaceDependances)
        {
                $this->_surfaceDependances = $_surfaceDependances;

                return $this;
        }

        public function garage()
        {
                return $this->_garage;
        }

        public function setGarage($_garage)
        {
                $this->_garage = $_garage;

                return $this;
        }

        public function verandas()
        {
                return $this->_verandas;
        }

        public function setVerandas($_verandas)
        {
                $this->_verandas = $_verandas;

                return $this;
        }

        public function alarme()
        {
                return $this->_alarme;
        }

        public function setAlarme($_alarme)
        {
                $this->_alarme = $_alarme;

                return $this;
        }

        public function typeChauffage()
        {
                return $this->_typeChauffage;
        }

        public function setTypeChauffage($_typeChauffage)
        {
                $this->_typeChauffage = $_typeChauffage;

                return $this;
        }

        public function anneeConstruction()
        {
                return $this->_anneeConstruction;
        }

        public function setAnneeConstruction($_anneeConstruction)
        {
                $this->_anneeConstruction = $_anneeConstruction;

                return $this;
        }

        public function nbSinitres()
        {
                return $this->_nbSinitres;
        }

        public function setNbSinitres($_nbSinitres)
        {
                $this->_nbSinitres = $_nbSinitres;

                return $this;
        }

        public function resiliationRecente()
        {
                return $this->_resiliationRecente;
        }

        public function setResiliationRecente($_resiliationRecente)
        {
                $this->_resiliationRecente = $_resiliationRecente;

                return $this;
        }

        public function logementDejaAssure()
        {
                return $this->_logementDejaAssure;
        }

        public function setLogementDejaAssure($_logementDejaAssure)
        {
                $this->_logementDejaAssure = $_logementDejaAssure;

                return $this;
        }

        public function dateDebutContratSouhaitee()
        {
                return $this->_dateDebutContratSouhaitee;
        }

        public function setDateDebutContratSouhaitee($_dateDebutContratSouhaitee)
        {
                $this->_dateDebutContratSouhaitee = $_dateDebutContratSouhaitee;

                return $this;
        }

        public function montantMinSouhaite()
        {
                return $this->_montantMinSouhaite;
        }

        public function setMontantMinSouhaite($_montantMinSouhaite)
        {
                $this->_montantMinSouhaite = $_montantMinSouhaite;

                return $this;
        }

        public function montantMaxSouhaite()
        {
                return $this->_montantMaxSouhaite;
        }

        public function setMontantMaxSouhaite($_montantMaxSouhaite)
        {
                $this->_montantMaxSouhaite = $_montantMaxSouhaite;

                return $this;
        }


        public function idClient()
        {
                return $this->_idClient;
        }

        public function setIdClient($_idClient)
        {
                $this->_idClient = $_idClient;

                return $this;
        }


        public function valeurMobilier()
        {
                return $this->_valeurMobilier;
        }

        public function setValeurMobilier($_valeurMobilier)
        {
                $this->_valeurMobilier = $_valeurMobilier;

                return $this;
        }

        public function dateAmenagementSouhaitee()
        {
                return $this->_dateAmenagementSouhaitee;
        }

        public function setDateAmenagementSouhaitee($_dateAmenagementSouhaitee)
        {
                $this->_dateAmenagementSouhaitee = $_dateAmenagementSouhaitee;

                return $this;
        }

        public function status()
        {
                return $this->_status;
        }

        public function setStatus($_status)
        {
                $this->_status = $_status;

                return $this;
        }
    }

?>