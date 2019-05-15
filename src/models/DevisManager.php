<?php
//=================================================================
//                   CLASS MANAGER - Devis
//=================================================================
define('DEVIS_ENATTENTE', 0);

class DevisManager extends Model {

    public static function getNewInstance(){
        return new DevisManager('tdevis', 'Devis', 'idDevis');
    } 

    protected function getListPropertyTable(){
        $p = ['idClient', 'status', 'categorieAppart', 'statusLogement', 'logementHabite', 'typeLogement', 'devisAdresseNum', 'devisAdresseRue', 'devisAdresseVille',
        'surface', 'nbPieces', 'surfaceDependances', 'garage', 'surfaceVeranda', 'alarme', 'typeChauffage', 
        'anneeConstruction', 'nbSinitres', 'resiliationRecente', 'logementDejaAssure', 'dateAmenagementSouhaitee', 'dateDebutContratSouhaitee', 
        'montantMinSouhaite', 'montantMaxSouhaite', 'valeurMobilier','nomAssureur', 'etage',
        'nbJoursInhabites', 'habitationPlusProche', 'veranda'
        ];
        return $p;
    }
    public function newDevis($datas){
        $Devis = new Devis($datas);
        return $Devis;
    }

    public function addDevis($data, $client){
        $this->activeBddConnexion();
        $Devis = new Devis($data);
        $Devis->setIdClient($client->idClient());
        $this->add($Devis);
        $Devis->setIdDevis(self::$_BddConnexion->lastInsertId()); 
        return $Devis;
    }

    public function getDevis($id){
        $this->activeBddConnexion();
        $Devis = $this->getFromId($id);
        return $Devis;        
    }

    public function deleteDevis($id){
        $this->activeBddConnexion();
        $this->deleteFromId($id);    
        // Prevoir une valeur de retour    
    }

    public function getAllDevis($oClient){
        $this->activeBddConnexion();
        return $this->getAll('idClient', $oClient->idClient());
    }

    public function getDevisEnAttente(){
        $this->activeBddConnexion();
        return $this->getAll('status', DEVIS_ENATTENTE);
    }


}

?>