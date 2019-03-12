<?php
//=================================================================
//                   CLASS MANAGER - Devis
//=================================================================
class DevisManager extends Model {

    public static function getNewInstance(){
        return new DevisManager('tdevis', 'Devis', 'idDevis');
    } 

    protected function getListPropertyTable(){
        $p = ['categorieAppart', 'statusLogement', 'logementHabite', 'typeLogement', 'adresseNum', 'adresseRue', 'adresseVille',
        'surface', 'nbPieces', 'surfaceDependances', 'garage', 'verandas', 'alarme', 'typeChauffage', 
        'anneeConstruction', 'nbSinitres', 'resiliationRecente', 'logementDejaAssure', 'dateAmenagementSouhaitee', 'dateDebutContratSouhaitee', 
        'montantMinSouhaite', 'montatnMaxSouhaite', 'categorieAppart'
        ];
        return $p;
    }

    public function addDevis($data){
        $this->activeBddConnexion();
        $Devis = new Devis($data);
        $this->add($Devis);
        $Devis->setIdDevis(self::$_BddConnexion->lastInsertId()); 
        return $Devis;
    }

    public function getDevis($oDevis){
        $this->activeBddConnexion();
        $Devis = $this->getFromId($oDevis->idDevis());
        return $Devis;        
    }

    public function getAllDevis($oUser){
        $this->activeBddConnexion();
        return $this->getAll();
    }


}

?>