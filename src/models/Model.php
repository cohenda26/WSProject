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

        // action identifie si on est en INSERT = 0 / UPDATE = 1
        protected function getListPropertyTable(){
          $p = [ ];
          return $p;
        }
    
        function aliasMethod($e){
            return ":".$e;
        }

        private function getArrayToString($a){
          $st = "";
          $arr_length = count($a); 
          for($i=0 ; $i<$arr_length ; $i++) 
          { 
            if ($i == $arr_length-1) {
              $st = $st . $a[$i];
            }
            else {
              $st = $st .  $a[$i] . ",";
            }
          }  
          return $st;    
        }
    
        private function getListAliasBinding(){
            $p = $this->getListPropertyTable();
            $pb = array_map(array('Model','aliasMethod'), $p);
            return $pb;
        }
    
        private function bindValue(DBObject $Odatas, $Req){
            $p = $this->getListPropertyTable();
            foreach ($p as $key => $value)
            {
              $method = $value;  
              $alias = $this->aliasMethod($value);
              if (method_exists($Odatas, $method))
              {
                $Req->bindValue($alias, $Odatas->$method());
              }
              else{
                echo "Model.bindValue error " . $alias . " " . $method;
              }
            }            
        }

        protected function add(DBObject $Odatas){
          $p = $this->getListPropertyTable();
          $pb = $this->getListAliasBinding();
  
          $ReqSt = 'INSERT INTO ' . $this->_tableName . ' ( ' . $this->getArrayToString($p) . ' ) VALUES ( ' . $this->getArrayToString($pb) . ' )';
          $Req = self::$_BddConnexion->prepare( $ReqSt );
  
          $this->bindValue($Odatas, $Req);
  
          $itemDB = $Req->execute();
          return $itemDB;
        }

        protected function delete(DBObject $Odatas){
          $reqSt = 'DELETE FROM '. $this->_tableName . ' WHERE ' . $this->_nameIdTable .' = '. $Odatas->$this->_nameIdTable();
          self::$_BddConnexion->exec( $reqSt );
        }

        public function deleteFromId($id){
          $reqSt = 'DELETE FROM '. $this->_tableName . ' WHERE ' . $this->_nameIdTable .' = '. $id;
          self::$_BddConnexion->exec( $reqSt );
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

        protected function getAll($columnNameIdentifiant="", $Identifiant="", $columnNameOrderBy = ""){
          $var = [];
          $stReq = 'SELECT * FROM ' . $this->_tableName ;

          if (strlen($columnNameIdentifiant) > 0) {
            $stReq = $stReq . ' WHERE '.  $columnNameIdentifiant .'='.$Identifiant;
          }

          if (strlen($columnNameOrderBy) > 0) {
            $stReq = $stReq . ' ORDER BY '. $columnNameOrderBy;
          }

          $Req = self::$_BddConnexion->prepare($stReq);
          $Req->execute();
          while($data = $Req->fetch(PDO::FETCH_ASSOC)){
            $var[] = new $this->_classNameObject($data);
          }
          $Req->closeCursor();
          return $var;
        }  

        protected function update(DBObject $Odatas){
          $p = $this->getListPropertyTable();
          $pb = $this->getListAliasBinding();

          $st = "";
          $arr_length = count($p); 
          for($i=0 ; $i<$arr_length ; $i++) 
          { 
            if ($i == $arr_length-1) {
              $st = $st . $p[$i] . '=' . $pb[$i];
            }
            else {
              $st = $st .  $p[$i] . '=' . $pb[$i] . ",";
            }
          }
  
          $ReqSt = 'UPDATE ' . $this->_tableName . ' SET ' . $st . ' WHERE ' . $this->_nameIdTable .'= :'.$this->_nameIdTable;

          $Req = self::$_BddConnexion->prepare( $ReqSt );
  
          $this->bindValue($Odatas, $Req);
          $Req->bindValue($this->aliasMethod($this->_nameIdTable), $Odatas->$this->_nameIdTable(), PDO::PARAM_INT);
  
          $itemDB = $Req->execute();
          return $itemDB;
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