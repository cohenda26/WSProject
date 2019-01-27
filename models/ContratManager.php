<?php
//=================================================================
//                   CLASS MANAGER - Contrat
//=================================================================
class ContratManager extends Model {

    public function add(DBClass $datas){
        $q = self::$_Bdd->prepare('INSERT INTO TContrat (datedebut, datefin, actif) VALUES(:datedebut, :datefin, :actif)');

        $q->bindValue(':datedebut', $datas->dateDebut());
        $q->bindValue(':datefin', $datas->dateFin());
        $q->bindValue(':actif', $class->actif(), PDO::PARAM_BOOL);
    
        $q->execute();
    }

    public function delete(DBClass $datas){
        self::$_Bdd->exec('DELETE FROM TContrat WHERE idContrat = '.$datas->idContrat());
    }

    public function get($id){
        $id = (int) $id;

        $q = self::$_Bdd->query('SELECT idContrat, datedebut, datefin, actif FROM TContrat WHERE idContrat = '.$id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
    
        return new Contrat($donnees);
    }

    public function getList(){
        $Contrats = [];

        $q = self::$_Bdd->query('SELECT idContrat, datedebut, datefin, actif FROM TContrat ORDER BY idContrat');
    
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
          $Contrats[] = new Contrat($donnees);
        }
    
        return $Contrats;
    }  

    public function update(DBClass $datas){
        $q = self::$_Bdd->prepare('UPDATE TContrat SET datedebut = :datedebut, datefin = :datefin, actif = :actif WHERE idContrat = :idContrat');

        $q->bindValue(':datedebut', $datas->dateDebut());
        $q->bindValue(':datefin', $datas->dateFin());
        $q->bindValue(':actif', $class->actif(), PDO::PARAM_BOOL);
        $q->bindValue(':idContrat', $datas->idContrat(), PDO::PARAM_INT);
    
        $q->execute();
    }

    public function clone(DBClass $datas){
        $newContrat = clone $datas;
        $this->add($newContrat);
        return $newContrat;
    }


}


?>