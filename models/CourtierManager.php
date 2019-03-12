<?php
//=================================================================
//                   CLASS MANAGER - Courtier
//=================================================================
class CourtierManager extends Model {

    public static function getNewInstance(){
        return new CourtierManager('tcourtier', 'Courtier', 'idCourtier');
    } 

    protected function getListPropertyTable(){
        $p = ['nom', 'numEssek', 'ville', 'rue', 'numero', 'telephone'
        ];
        return $p;
    }

    public function addCourtier($data){
        $this->activeBddConnexion();
        $courtier = new Courtier($data);
        $this->add($courtier);
        $courtier->setIdCourtier(self::$_BddConnexion->lastInsertId()); 
        return $courtier;
    }

    public function getCourtier($oUser){
        $this->activeBddConnexion();
        $courtier = $this->getFromId($oUser->idCourtier());
        return $courtier;        
    }

    public function getClients(){
        $this->activeBddConnexion();
        $currentCourtier =  UserManager::getSessionCourtier();
        $clientManager = ClientManager::getNewInstance();
        return $clientManager->getClients();  
    }
}


?>