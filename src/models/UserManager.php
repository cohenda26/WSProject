<?php

class UserManager extends Model {

    public static function getNewInstance(){
        return new UserManager('tuser', 'User', 'idUser');
    } 

    public static function getSessionUser(){
        if (isset($_SESSION['currentUser'])){
            return unserialize($_SESSION['currentUser']);
        }
        else return null;
    }

    public static function getSessionCourtier(){
        if (isset($_SESSION['currentCourtier'])){
            return unserialize($_SESSION['currentCourtier']);    
        }
        else return null;
    }

    public static function getSessionClient(){
        if (isset($_SESSION['currentClient'])){
            return unserialize($_SESSION['currentClient']);    
        }
        else return null;
    }

    public static function activeSession($user, $courtier, $client){
        $_SESSION['currentUser'] = serialize($user);     
        $_SESSION['currentCourtier'] = serialize($courtier);
        $_SESSION['currentClient'] = serialize($client);
    }

    public static function destroySession(){
        if (isset($_SESSION['currentUser'])){
            unset($_SESSION['currentUser']);
            unset($_SESSION['currentCourtier']);
            unset($_SESSION['currentClient']);
            //session_destroy();     
        }
    }

    protected function getListPropertyTable(){
        $p = [ 'userName', 'email', 'password', 'idCourtier', 'idClient' ];
        return $p;
    }

    public function getUser($data){
        $this->activeBddConnexion();
        $user = $this->get("email", self::$_BddConnexion->quote($data['email']));
        return $user;
    }

    public function registerUser($data){
        $clientManager = ClientManager::getNewInstance();
        $client = $clientManager->addClient($data);

        $this->activeBddConnexion();
        $user = new User($data);
        $user->setIdClient($client->idClient());

        $userDB = $this->add($user);
        return $userDB;
    }

    public function registerCourtier($data){
        $courtierManager = CourtierManager::getNewInstance();
        $courtier = $courtierManager->addCourtier($data);

        $this->activeBddConnexion();
        $user = new User($data);
        $user->setIdCourtier($courtier->idCourtier());

        $userDB = $this->add($user);

        return $userDB;
    }
}

?>