<?php
//=================================================================
//                   CLASS MANAGER - CLIENT
//=================================================================
class ClientManager extends Model {

    public static function getNewInstance(){
        return new ClientManager('tclient', 'client', 'idClient');
    } 

    protected function getListPropertyTable(){
        $p = [ 'nom', 'prenom'];
         return $p;
    }

    public function addClient($data){
        $this->activeBddConnexion();
        $client = new Client($data);
        $this->add($client);
        $client->setIdClient(self::$_BddConnexion->lastInsertId()); 
        return $client;
    }

    public function getClient($oUser){
        $this->activeBddConnexion();
        $client = $this->getFromId($oUser->idClient());
        return $client;        
    }

    public function getClients(){
        $this->activeBddConnexion();
        return $this->getAll();
    }

    public function getAllContrats($params){

    }

    public function getContratsHabitations(){
    }

    public function getContratsVie(){
    }

    public function getContratsVoitures(){
    }
}

?>