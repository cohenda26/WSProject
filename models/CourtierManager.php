<?php
//=================================================================
//                   CLASS MANAGER - Courtier
//=================================================================
class CourtierManager extends Model {

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

    // public function get($id){
    //     $id = (int) $id;

    //     $Req = self::$_BddConnexion->query('SELECT idCourtier, nom, numessek, ville, rue, numero, telephone  FROM TCourtier WHERE idCourtier = '.$id);
    //     $donnees = $Req->fetch(PDO::FETCH_ASSOC);
    //     $Req->closeCursor();    
    //     return new Courtier($donnees);
    // }

    // public function getList(){
    //     $Courtiers = [];

    //     $Req = self::$_BddConnexion->query('SELECT idCourtier, nom, numessek, ville, rue, numero, telephone FROM TCourtier ORDER BY nom');
    
    //     while ($donnees = $Req->fetch(PDO::FETCH_ASSOC))
    //     {
    //       $Courtiers[] = new Courtier($donnees);
    //     }
    //     $Req->closeCursor();    
    //     return $Courtiers;
    // }  

    public function update(DBObject $Odatas){
        $Req = self::$_BddConnexion->prepare('UPDATE TCourtier SET nom = :nom, numessek = :numessek, ville = :ville, rue = :rue, numero : :numero, telephone = :telephone WHERE idCourtier = :idCourtier');

        $Req->bindValue(':nom', $Odatas->nom());
        $Req->bindValue(':prenom', $Odatas->numEssek());
        $Req->bindValue(':ville', $Odatas->ville());
        $Req->bindValue(':rue', $Odatas->rue());
        $Req->bindValue(':numero', $Odatas->numero(), PDO::PARAM_INT);
        $Req->bindValue(':telephone', $Odatas->telephone());
        $Req->bindValue(':idCourtier', $Odatas->idCourtier(), PDO::PARAM_INT);
    
        $Req->execute();
    }

    public function clone(DBObject $Odatas){
        $newCourtier = clone $Odatas;
        $this->add($newCourtier);
        return $newCourtier;
    }


    public function addCourtier($data){
        $this->activeBddConnexion();
        $courtier = new Courtier($data);
        $this->add($courtier);
        $courtier->setIdCourtier(self::$_BddConnexion->lastInsertId()); 
        return $courtier;
    }
}


?>