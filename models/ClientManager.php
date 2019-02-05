<?php
//=================================================================
//                   CLASS MANAGER - CLIENT
//=================================================================
class ClientManager extends Model {

    public static function getNewInstance(){
        return new ClientManager('tclient', 'client', 'idClient');
    } 

    private function add(DBObject $Odatas){
        $Req = self::$_BddConnexion->prepare('INSERT INTO TClient (nom, prenom) VALUES(:nom, :prenom)');

        $Req->bindValue(':nom', $Odatas->nom());
        $Req->bindValue(':prenom', $Odatas->prenom());
    
        $Req->execute();
    }

    private function delete(DBObject $Odatas){
        self::$_BddConnexion->exec('DELETE FROM TClient WHERE idClient = '.$Odatas->idClient());
    }

    private function update(DBObject $Odatas){
        $Req = self::$_BddConnexion->prepare('UPDATE TClient SET nom = :nom, prenom = :prenom WHERE idClient = :idClient');

        $Req->bindValue(':nom', $Odatas->nom());
        $Req->bindValue(':prenom', $Odatas->prenom());
        $Req->bindValue(':idClient', $Odatas->idClient(), PDO::PARAM_INT);
    
        $Req->execute();
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