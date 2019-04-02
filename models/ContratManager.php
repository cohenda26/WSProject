<?php
//=================================================================
//                   CLASS MANAGER - Contrat
//=================================================================
class ContratManager extends Model {

    public static function getNewInstance(){
        return new ContratManager('tcontrat', 'Contrat', 'idContrat');
    } 
    protected function getListPropertyTable(){
        $p = ['dateDebut', 'dateFin', 'actif'
        ];
        return $p;
    }

    public function getAllContrats($oClient){
        $this->activeBddConnexion();
        return $this->getAll('idClient', $oClient->idClient());
    }
}


?>