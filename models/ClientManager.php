<?php
    //include 'Client.php';

//=================================================================
//                   CLASS MANAGER - CLIENT
//=================================================================
class ClientManager extends Model {

    private function add(DBClass $datas){
        $q = $this->_db->prepare('INSERT INTO TClient (nom, prenom) VALUES(:nom, :prenom)');

        $q->bindValue(':nom', $datas->nom());
        $q->bindValue(':prenom', $datas->prenom());
        //$q->bindValue(':collone', $class->variable(), PDO::PARAM_INT);
    
        $q->execute();
    }

    private function delete(DBClass $datas){
        $this->_db->exec('DELETE FROM TClient WHERE idClient = '.$datas->idClient());
    }

    private function get($id){
        $id = (int) $id;

        $q = $this->_db->query('SELECT idClient, nom, prenom FROM TClient WHERE idClient = '.$id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
    
        return new Client($donnees);
    }

    private function getList(){
        $clients = [];

        $q = self::$_Bdd->query('SELECT idClient, nom, prenom FROM TClient ORDER BY nom');
    
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
          $clients[] = new Client($donnees);
        }
        $q->closeCursor();
    
        return $clients;
    }  

    private function update(DBClass $datas){
        $q = $this->_db->prepare('UPDATE TClient SET nom = :nom, prenom = :prenom WHERE idClient = :idClient');

        $q->bindValue(':nom', $datas->nom());
        $q->bindValue(':prenom', $datas->prenom());
        $q->bindValue(':idClient', $datas->idClient(), PDO::PARAM_INT);
    
        $q->execute();
    }

    private function clone(DBClass $datas){
        $newClient = clone $datas;
        $this->add($newClient);
        return $newClient;
    }


    public function getClients(){
        $this->getBdd();
        return $this->getList();
        //return $this->getAll("TClient", "Client");

    }
}

?>