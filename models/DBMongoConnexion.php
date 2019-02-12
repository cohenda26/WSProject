<?php
    //=================================================================
    //                   DATABASE CONNEXION
    //
    //    Documentation pour utilisation des methodes MONGODB
    //
    //    https://doc.bccnsoft.com/docs/php-docs-7-en/book.mongodb.html
    //
    //=================================================================
    class DBMongoConnexion
    {
        private static $manager; 
        private static $db_config = array();

        private static function initialize()
        {
            self::$db_config['DB_NAME']	= 'dbstats';

            self::$db_config['USER']	= 'root';
            self::$db_config['PASSWORD']	= '';

            self::$db_config['HOST']	= 'localhost';
            self::$db_config['PORT']	= '27017';
            self::$db_config['SGBD']	= 'mongodb';
        }

        public static function getMongoInstanceConnexion()
        {
            if(null === self::$manager)
            {
                try
                {
                   self::initialize();
                   self::$manager = new MongoDB\Driver\Manager(self::$db_config['SGBD'] .'://'. self::$db_config['HOST'] .':'. self::$db_config['PORT']);
                   $ns = 'WebSchoolDemande.WebSchoolDemandeCollection';
                   
                   // Create query object with all options:
                   $query = new MongoDB\Driver\Query( [], // query (empty: select all)
                                                      [ 'sort' => [ 'name' => 1 ], 'limit' => 10 ] // options
                                                    );
                   
                   // Execute query and obtain cursor:
                   $cursor = self::$manager->executeQuery( $ns, $query );
                   var_dump($cursor->toArray());
                   foreach ($cursor as $document) {
                        var_dump($document);
                    }

                }
                catch (MongoDB\Driver\Exception\Exception $exce)
                {
                    $filename = basename(__FILE__);
        
                    echo "The $filename script has experienced an error.\n"; 
                    echo "It failed with the following exception:\n";
                    
                    echo "Exception:", $exce->getMessage(), "\n";
                    echo "In file:", $exce->getFile(), "\n";
                    echo "On line:", $exce->getLine(), "\n";    

                } catch (Exception $e) {
                    // Un autre type d'erreur
                    echo "exception sur connexion mySQL";
                }
            }
            return self::$manager;
        }
    }

    DBMongoConnexion::getMongoInstanceConnexion();
?>



<!-- You can use the new mongo client driver which provides all the methods similar to legacy driver.

Installation

Tutorial

Find one example
---------------
require 'vendor/autoload.php';
-----------------------------

$m= new MongoDB\Client("mongodb://127.0.0.1/");
$db = $m->db;
$collection = $db->col;
$query = array();
$document = $collection->findOne($query);
You can use below equivalents if you want to use driver manager api

$collection->remove
--------------------
$bulkWrite=new MongoDB\Driver\BulkWrite;
$filter=array();
$bulkWrite->delete($filter, array('limit'=>1));
$mongoConn->executeBulkWrite('db.col', $bulkWrite); 

$collection->save
-----------------

Insert:
------
$bulkWrite=new MongoDB\Driver\BulkWrite;
$doc=array();
$bulk->insert($doc);
$mongoConn->executeBulkWrite('db.col', $bulkWrite);

Update:
-------
$bulkWrite=new MongoDB\Driver\BulkWrite;
$filter=array();
$update=array('$set' => array());
$options=array('multi' => false, 'upsert' => false);
$bulkWrite->update($filter, $options);
$mongoConn->executeBulkWrite('db.col', $bulkWrite);

$collection->findOne
-------------------
$filter= array();
$options = array('limit'=>1);
$query = new MongoDB\Driver\Query($filter, $options);
$mongoConn->executeQuery('db.col', $query); -->