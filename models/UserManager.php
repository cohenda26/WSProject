<?php

class UserManager extends Model {

    public static function getNewInstance(){
        return new UserManager('tuser', 'User', 'idUser');
    } 

    public static function getSessionUser(){
        return unserialize($_SESSION['currentUser']);
    }

    public static function getSessionCourtier(){
        return unserialize($_SESSION['currentCourtier']);    
    }

    private function add(DBObject $Odatas){
        $Req = self::$_BddConnexion->prepare('INSERT INTO tuser (username, email, password, idCourtier) VALUES(:username, :email, :password, :idCourtier)');

        $Req->bindValue(':username', $Odatas->username());
        $Req->bindValue(':email', $Odatas->email());
        $Req->bindValue(':password', $Odatas->password());
        $Req->bindValue(':idCourtier', $Odatas->idCourtier());

        $userDB = $Req->execute();
        return $userDB;
    }

    public function activeSession($user, $courtier){
        $_SESSION['currentUser'] = serialize($user);     
        $_SESSION['currentCourtier'] = serialize($courtier);
    }

    public function destroySession(){
        if (isset($_SESSION['currentUser'])){
            unset($_SESSION['currentUser']);
            unset($_SESSION['currentCourtier']);
            //session_destroy();     
        }
    }

    public function getUser($data){
        $this->activeBddConnexion();
        $user = $this->get("email", self::$_BddConnexion->quote($data['email']));
        return $user;
    }

    public function registerUser($data){
        $user = new User($data);
        $this->activeBddConnexion();
        $userDB = $this->add($user);
        return $userDB;
    }

    public function registerPartenaire($data){
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