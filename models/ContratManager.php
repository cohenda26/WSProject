<?php
//=================================================================
//                   CLASS MANAGER - Contrat
//=================================================================
class ContratManager extends Model {

    public static function getNewInstance(){
        return new ContratManager('tcontrat', 'Contrat', 'idContrat');
    } 

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

    public function update(DBObject $Odatas){
        $Req = self::$_BddConnexion->prepare('UPDATE TContrat SET datedebut = :datedebut, datefin = :datefin, actif = :actif WHERE idContrat = :idContrat');

        $Req->bindValue(':datedebut', $Odatas->dateDebut());
        $Req->bindValue(':datefin', $Odatas->dateFin());
        $Req->bindValue(':actif', $Odatas->actif(), PDO::PARAM_BOOL);
        $Req->bindValue(':idContrat', $Odatas->idContrat(), PDO::PARAM_INT);
    
        $Req->execute();
    }

}


?>