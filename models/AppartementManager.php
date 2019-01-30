<?php
//=================================================================
//                   CLASS MANAGER - Appartement
//=================================================================
class AppartementManager extends DBClassManager {

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

    // public function get($id){
    //     $id = (int) $id;

    //     $Req = self::$_BddConnexion->query('SELECT idAppartement, ville, rue, numero, surface, NbPieces, anneeconstruction FROM TAppartement WHERE idAppartement = '.$id);
    //     $donnees = $Req->fetch(PDO::FETCH_ASSOC);
    //     $Req->closeCursor();
    //     return new Appartement($donnees);
    // }

    // public function getList($where = null){
    //     $Appartements = [];

    //     $clauseWhere = is_null($where) ? "" : " WHERE $where ";
    
    //     $Req = self::$_BddConnexion->query('SELECT idAppartement, ville, rue, numero, surface, NbPieces, anneeconstruction FROM TAppartement' . $clauseWhere .' ORDER BY idAppartement');
    
    //     while ($donnees = $Req->fetch(PDO::FETCH_ASSOC))
    //     {
    //       $Appartements[] = new Appartement($donnees);
    //     }
    //     $Req->closeCursor();    
    //     return $Appartements;
    // }  

    // public function getListFromClient($id){
    //     return $this->getList(" IdClient=$id ");
    // }

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

    public function clone(DBObject $Odatas){
        $newAppartement = clone $Odatas;
        $this->add($newAppartement);
        return $newAppartement;
    }

}


?>