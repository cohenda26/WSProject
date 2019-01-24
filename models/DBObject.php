<?php
    //=================================================================
    //                   DATABASE TABLE TEMPLATE
    //=================================================================
    class DBObject {
        public function __clone() {
        }

        public function __construct($datas){
            if (isset($datas)){
            $this->hydrate($datas);
            }
        }

        private function hydrate(array $donnees) {
            foreach ($donnees as $key => $value)
            {
              // On récupère le nom du setter correspondant à l'attribut.
              $method = 'set'.ucfirst($key);
              //echo "hydrate propertie $method <br> ";                  
              // Si le setter correspondant existe.
              if (method_exists($this, $method))
              {
                // On appelle le setter.
                $this->$method($value);
              }
            }
        }

    }
 
?>