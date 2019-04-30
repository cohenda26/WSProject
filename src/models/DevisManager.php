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
        'surface', 'nbPieces', 'surfaceDependances', 'garage', 'verandas', 'alarme', 'typeChauffage', 
        'anneeConstruction', 'nbSinitres', 'resiliationRecente', 'logementDejaAssure', 'dateAmenagementSouhaitee', 'dateDebutContratSouhaitee', 
        'montantMinSouhaite', 'montantMaxSouhaite', 'valeurMobilier'
        ];
        return $p;
    }

    public function addDevis($data, $client){
        $this->activeBddConnexion();
        $Devis = new Devis($data);
        $Devis->setIdClient($client->idClient());
        $this->add($Devis);
        $Devis->setIdDevis(self::$_BddConnexion->lastInsertId()); 
        return $Devis;
    }

    public function getDevis($oDevis){
        $this->activeBddConnexion();
        $Devis = $this->getFromId($oDevis->idDevis());
        return $Devis;        
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