<?php
//=================================================================
//                   CLASS MANAGER - CLIENT
//=================================================================
class ClientManager extends Model {

    private function add(DBObject $Odatas){
        $Req = self::$_BddConnexion->prepare('INSERT INTO TClient (nom, prenom) VALUES(:nom, :prenom)');

        $Req->bindValue(':nom', $Odatas->nom());
        $Req->bindValue(':prenom', $Odatas->prenom());
    
        $Req->execute();
    }

    private function delete(DBObject $Odatas){
        self::$_BddConnexion->exec('DELETE FROM TClient WHERE idClient = '.$Odatas->idClient());
    }

    private function get($id){
        $id = (int) $id;

        $Req = self::$_BddConnexion->query('SELECT idClient, nom, prenom FROM TClient WHERE idClient = '.$id);
        $donnees = $Req->fetch(PDO::FETCH_ASSOC);
        $Req->closeCursor();
        return new Client($donnees);
    }

    // private function getList(){
    //     $clients = [];

    //     $Req = self::$_BddConnexion->query('SELECT idClient, nom, prenom FROM TClient ORDER BY nom');
    
    //     while ($donnees = $Req->fetch(PDO::FETCH_ASSOC))
    //     {
    //       $clients[] = new Client($donnees);
    //     }
    //     $Req->closeCursor();
    
    //     return $clients;
    // }  

    private function update(DBObject $Odatas){
        $Req = self::$_BddConnexion->prepare('UPDATE TClient SET nom = :nom, prenom = :prenom WHERE idClient = :idClient');

        $Req->bindValue(':nom', $Odatas->nom());
        $Req->bindValue(':prenom', $Odatas->prenom());
        $Req->bindValue(':idClient', $Odatas->idClient(), PDO::PARAM_INT);
    
        $Req->execute();
    }

    private function clone(DBObject $Odatas){
        $newClient = clone $Odatas;
        $this->add($newClient);
        return $newClient;
    }


    public function getClients(){
        $this->activeBddConnexion();
        //return $this->getList();
        //return $this->getAll("TClient", "Client");

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