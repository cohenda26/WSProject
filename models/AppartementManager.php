<?php
//=================================================================
//                   CLASS MANAGER - Appartement
//=================================================================
class AppartementManager extends Model {

    public static function getNewInstance(){
        return new AppartementManager('tappartement', 'Appartement', 'idAppartement');
    } 

    public function add(DBObject $Odatas){
        $Req = self::$_BddConnexion->prepare('INSERT INTO TAppartement (ville, rue, numero, surface, NbPieces, anneeconstruction) 
        VALUES(:ville, :rue, :numero, :surface, :NbPieces, :anneeConstruction)');

        $Req->bindValue(':ville', $Odatas->ville());
        $Req->bindValue(':rue', $Odatas->rue());
        $Req->bindValue(':numero', $Odatas->numero(), PDO::PARAM_INT);
        $Req->bindValue(':surface', $Odatas->surface(), PDO::PARAM_INT);
        $Req->bindValue(':NbPieces', $Odatas->nbPieces(), PDO::PARAM_INT);
        $Req->bindValue(':anneeConstruction', $Odatas->anneeConstruction(), PDO::PARAM_INT);
    
        $Req->execute();
    }

    public function delete(DBObject $Odatas){
        self::$_BddConnexion->exec('DELETE FROM TAppartement WHERE idAppartement = '.$Odatas->idAppartement());
    }

    public function update(DBObject $Odatas){
        $Req = $this->_db->prepare('UPDATE TAppartement SET nom = :ville, prenom = :rue, numero = :numero, surface = :surface, NbPieces = :nbPieces, anneeConstruction = : anneeConstruction WHERE idAppartement = :idAppartement');

        $Req->bindValue(':ville', $Odatas->ville());
        $Req->bindValue(':rue', $Odatas->rue());
        $Req->bindValue(':numero', $Odatas->numero(), PDO::PARAM_INT);
        $Req->bindValue(':surface', $Odatas->surface(), PDO::PARAM_INT);
        $Req->bindValue(':NbPieces', $Odatas->nbPieces(), PDO::PARAM_INT);
        $Req->bindValue(':anneeConstruction', $Odatas->anneeConstruction(), PDO::PARAM_INT);
        $Req->bindValue(':idAppartement', $Odatas->idAppartement(), PDO::PARAM_INT);
    
        $Req->execute();
    }

}


?>