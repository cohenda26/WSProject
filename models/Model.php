<?php   
    require_once(MODELS.'DBConnexion.php');

    //=================================================================
    //                   DATABASE MANAGER TEMPLATE
    //=================================================================
    abstract class Model {
        protected static $_BddConnexion; // Instance de PDO

        private function add(DBObject $Odatas){

        }

        private function delete(DBObject $Odatas){

        }

        protected function get($table, $classNameObj, $idTable, $id){
          $var = null;
          // $id = (int) $id;

          $Req = self::$_BddConnexion->query('SELECT * FROM '.$table . ' WHERE '. $idTable .'='.$id);
          $data = $Req->fetch(PDO::FETCH_ASSOC);
          if ($data != null){
            $var = new $classNameObj($data);
          }
          $Req->closeCursor();

          return $var;
        }

        private function getList($table, $classNameObj, $idTable){
          $var = [];
          $Req = self::$_BddConnexion->prepare('SELECT * FROM '.$table . ' ORDER BY '. $idTable);
          $Req->execute();
          while($data = $Req->fetch(PDO::FETCH_ASSOC)){
            $var[] = new $classNameObj($data);
          }
          $Req->closeCursor();
          return $var;
        }  

        private function update(DBObject $Odatas){

        }
        
        private function clone(DBObject $Odatas){

        }

        protected function getDatas($table, $idTable, $classNameObj){

        }

        private static function setBddConnexion($Bdd)
        {
          if ($Bdd == null){
            $Bdd = DBConnexion::getInstanceConnexion();
          }
          self::$_BddConnexion = $Bdd;
        }

        public function activeBddConnexion(){
          if (self::$_BddConnexion == null){
            self::setBddConnexion(null);
          }
          return self::$_BddConnexion;
        }
    }


?>