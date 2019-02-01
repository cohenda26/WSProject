<?php   
    require_once(MODELS.'DBConnexion.php');

    //=================================================================
    //                   DATABASE MANAGER TEMPLATE
    //=================================================================
    abstract class Model {
        protected static $_BddConnexion; // Instance de PDO
        private $_tableName;
        private $_classNameObject;
        private $_nameIdTable;

        public function __construct($tableName, $classNameObject, $nameIdTable){
          $this->_tableName = $tableName;
          $this->_classNameObject = $classNameObject;
          $this->_nameIdTable = $nameIdTable;
        }

        private function add(DBObject $Odatas){

        }

        private function delete(DBObject $Odatas){

        }

        public function getFromId($id){
          return $this->get($this->_nameIdTable, $id);
        }

        protected function get($columnNameIdentifiant, $Identifiant){
          $var = null;
          // $id = (int) $id;

          $Req = self::$_BddConnexion->query('SELECT * FROM '. $this->_tableName . ' WHERE '. $columnNameIdentifiant .'='.$Identifiant);
          $data = $Req->fetch(PDO::FETCH_ASSOC);
          if ($data != null){
            $var = new $this->_classNameObject($data);
          }
          $Req->closeCursor();

          return $var;
        }

        private function getAll($columnNameOrderBy = ""){
          $var = [];
          $stReq = 'SELECT * FROM ' . $this->_tableName ;
          if (strlen($stReq) > 0) {
            $stReq = $stReq . ' ORDER BY '. $columnNameOrderBy;
          }
          $Req = self::$_BddConnexion->prepare($stReq);
          $Req->execute();
          while($data = $Req->fetch(PDO::FETCH_ASSOC)){
            $var[] = new $_classNameObject($data);
          }
          $Req->closeCursor();
          return $var;
        }  

        private function update(DBObject $Odatas){

        }
        
        public function clone(DBObject $Odatas){
          $newObject = clone $Odatas;
          $this->add($newObject);
          return $newObject;
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