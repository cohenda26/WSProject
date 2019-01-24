<?php
    //=================================================================
    //                   DATABASE CONNEXION
    //=================================================================
    class DBConnexion
    {
        private static $instance; 
        private static $db_config = array();

        private static function initialize()
        {
            self::$db_config['DB_NAME']	= 'baseprojectwebschool';
            self::$db_config['OPTIONS']	= array(
                // Activation des exceptions PDO :
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                // Change le fetch mode par défaut sur FETCH_ASSOC ( fetch() retournera un tableau associatif ) :
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            );

            self::$db_config['USER']	= 'root';
            self::$db_config['PASSWORD']	= '';

            self::$db_config['HOST']	= 'localhost';
            self::$db_config['SGBD']	= 'mysql';
        }

        public static function getInstanceConnection()
        {
            if(null === self::$instance)
            {
                try
                {
                    self::initialize();
                    self::$instance = new PDO(self::$db_config['SGBD'] .':host='. self::$db_config['HOST'] .';dbname='. self::$db_config['DB_NAME'],
                                              self::$db_config['USER'],
                                              self::$db_config['PASSWORD'],
                                              self::$db_config['OPTIONS']);
                }
                catch (PDOException $exce)
                {
                    die("Erreur de connexion : " . $exce->getMessage() );
                } catch (Exception $e) {
                    // Un autre type d'erreur
                    echo "exception sur connexion mySQL";
                }
            }
            return self::$instance;
        }
    }

?>