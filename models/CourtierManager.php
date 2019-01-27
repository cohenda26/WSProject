<?php
//=================================================================
//                   CLASS MANAGER - Courtier
//=================================================================
class CourtierManager extends Model {

    public function add(DBClass $datas){
        $q = self::$_Bdd->prepare('INSERT INTO TCourtier (nom, numessek, ville, rue, numero, telephone ) 
        VALUES(:nom, :numessek, :ville, :rue, :numero, :telephone)');

        $q->bindValue(':nom', $datas->nom());
        $q->bindValue(':prenom', $datas->numEssek());
        $q->bindValue(':ville', $datas->ville());
        $q->bindValue(':rue', $datas->rue());
        $q->bindValue(':numero', $datas->numero(), PDO::PARAM_INT);
        $q->bindValue(':telephone', $datas->telephone());
        //$q->bindValue(':collone', $class->variable(), PDO::PARAM_INT);
    
        $q->execute();
    }

    public function delete(DBClass $datas){
        self::$_Bdd->exec('DELETE FROM TCourtier WHERE idCourtier = '.$datas->idCourtier());
    }

    public function get($id){
        $id = (int) $id;

        $q = self::$_Bdd->query('SELECT idCourtier, nom, numessek, ville, rue, numero, telephone  FROM TCourtier WHERE idCourtier = '.$id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
    
        return new Courtier($donnees);
    }

    public function getList(){
        $Courtiers = [];

        $q = self::$_Bdd->query('SELECT idCourtier, nom, numessek, ville, rue, numero, telephone FROM TCourtier ORDER BY nom');
    
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
          $Courtiers[] = new Courtier($donnees);
        }
    
        return $Courtiers;
    }  

    public function update(DBClass $datas){
        $q = self::$_Bdd->prepare('UPDATE TCourtier SET nom = :nom, numessek = :numessek, ville = :ville, rue = :rue, numero : :numero, telephone = :telephone WHERE idCourtier = :idCourtier');

        $q->bindValue(':nom', $datas->nom());
        $q->bindValue(':prenom', $datas->numEssek());
        $q->bindValue(':ville', $datas->ville());
        $q->bindValue(':rue', $datas->rue());
        $q->bindValue(':numero', $datas->numero(), PDO::PARAM_INT);
        $q->bindValue(':telephone', $datas->telephone());
        $q->bindValue(':idCourtier', $datas->idCourtier(), PDO::PARAM_INT);
    
        $q->execute();
    }

    public function clone(DBClass $datas){
        $newCourtier = clone $datas;
        $this->add($newCourtier);
        return $newCourtier;
    }

}


?>