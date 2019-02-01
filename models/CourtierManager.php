<?php
//=================================================================
//                   CLASS MANAGER - Courtier
//=================================================================
class CourtierManager extends Model {

    public static function getNewInstance(){
        return new CourtierManager('tcourtier', 'Courtier', 'idCourtier');
    } 

    public function add(DBObject $Odatas){
        $Req = self::$_BddConnexion->prepare('INSERT INTO TCourtier (nom, numessek, ville, rue, numero, telephone ) 
        VALUES(:nom, :numessek, :ville, :rue, :numero, :telephone)');

        $Req->bindValue(':nom', $Odatas->nom());
        $Req->bindValue(':numessek', $Odatas->numEssek());
        $Req->bindValue(':ville', $Odatas->ville());
        $Req->bindValue(':rue', $Odatas->rue());
        $Req->bindValue(':numero', $Odatas->numero());
        $Req->bindValue(':telephone', $Odatas->telephone());
        //$Req->bindValue(':collone', $class->variable(), PDO::PARAM_INT);
    
        $Req->execute();
    }

    public function delete(DBObject $Odatas){
        self::$_BddConnexion->exec('DELETE FROM TCourtier WHERE idCourtier = '.$Odatas->idCourtier());
    } 

    public function update(DBObject $Odatas){
        $Req = self::$_BddConnexion->prepare('UPDATE TCourtier SET nom = :nom, numessek = :numessek, ville = :ville, rue = :rue, numero : :numero, telephone = :telephone WHERE idCourtier = :idCourtier');

        $Req->bindValue(':nom', $Odatas->nom());
        $Req->bindValue(':prenom', $Odatas->numEssek());
        $Req->bindValue(':ville', $Odatas->ville());
        $Req->bindValue(':rue', $Odatas->rue());
        $Req->bindValue(':numero', $Odatas->numero());
        $Req->bindValue(':telephone', $Odatas->telephone());
        $Req->bindValue(':idCourtier', $Odatas->idCourtier(), PDO::PARAM_INT);
    
        $Req->execute();
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
}


?>