<?php   
    require_once('DBConnexion.php');

    //=================================================================
    //                   DATABASE MANAGER TEMPLATE
    //=================================================================
    abstract class Model {
        protected static $_Bdd; // Instance de PDO

        private function add(DBClass $datas){

        }
        private function delete(DBClass $datas){

        }
        protected function get($table, $idTable, $obj, $id){
          $var = [];
          $id = (int) $id;

          $req = self::$_Bdd->query('SELECT * FROM '.$table . ' WHERE '. $idTable .'='.$id);
          $data = $req->fetch(PDO::FETCH_ASSOC);
          if ($data != null){
            $var[] = new $obj($data);
          }
          $req->closeCursor();

          return $var;
        }
        private function getList(){

        }  
        private function update(DBClass $datas){

        }
        private function clone(DBClass $datas){

        }

        protected function getDatas($table, $idTable, $obj){
          $var = [];
          $req = self::$_Bdd->prepare('SELECT * FROM '.$table . ' ORDER BY '. $idTable .' desc');
          $req->execute();
          while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $var[] = new $obj($data);
          }
          $req->closeCursor();
          return $var;
        }

        private static function setBdd($Bdd)
        {
          if ($Bdd == null){
            $Bdd = DBConnexion::getInstanceConnection();
          }
          self::$_Bdd = $Bdd;
        }

        public function getBdd(){
          if (self::$_Bdd == null){
            self::setBdd(null);
          }
          return self::$_Bdd;
        }
    }


?>