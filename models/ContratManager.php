<?php
//=================================================================
//                   CLASS MANAGER - Contrat
//=================================================================
class ContratManager extends Model {

    public function add(DBObject $Odatas){
        $Req = self::$_BddConnexion->prepare('INSERT INTO TContrat (datedebut, datefin, actif) VALUES(:datedebut, :datefin, :actif)');

        $Req->bindValue(':datedebut', $Odatas->dateDebut());
        $Req->bindValue(':datefin', $Odatas->dateFin());
        $Req->bindValue(':actif', $Odatas->actif(), PDO::PARAM_BOOL);
    
        $Req->execute();
    }

    public function delete(DBObject $Odatas){
        self::$_BddConnexion->exec('DELETE FROM TContrat WHERE idContrat = '.$Odatas->idContrat());
    }

    // public function get($id){
    //     $id = (int) $id;

    //     $Req = self::$_BddConnexion->query('SELECT idContrat, datedebut, datefin, actif FROM TContrat WHERE idContrat = '.$id);
    //     $donnees = $Req->fetch(PDO::FETCH_ASSOC);
    //     $Req->closeCursor();    
    //     return new Contrat($donnees);
    // }

    // public function getList(){
    //     $Contrats = [];

    //     $Req = self::$_BddConnexion->query('SELECT idContrat, datedebut, datefin, actif FROM TContrat ORDER BY idContrat');
    
    //     while ($donnees = $Req->fetch(PDO::FETCH_ASSOC))
    //     {
    //       $Contrats[] = new Contrat($donnees);
    //     }
    //     $Req->closeCursor();    
    //     return $Contrats;
    // }  

    public function update(DBObject $Odatas){
        $Req = self::$_BddConnexion->prepare('UPDATE TContrat SET datedebut = :datedebut, datefin = :datefin, actif = :actif WHERE idContrat = :idContrat');

        $Req->bindValue(':datedebut', $Odatas->dateDebut());
        $Req->bindValue(':datefin', $Odatas->dateFin());
        $Req->bindValue(':actif', $Odatas->actif(), PDO::PARAM_BOOL);
        $Req->bindValue(':idContrat', $Odatas->idContrat(), PDO::PARAM_INT);
    
        $Req->execute();
    }

    public function clone(DBObject $Odatas){
        $newContrat = clone $Odatas;
        $this->add($newContrat);
        return $newContrat;
    }


}


?>