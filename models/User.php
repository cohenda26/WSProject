<?php

//=================================================================
//                   CLASS OBJET - User
//=================================================================
class User extends DBObject{
    private $_idUser = 0;
    private $_userName="";
    private $_email = "";
    private $_password="";
    private $_idCourtier=0;
    private $_isCourtier = false;


    public function __clone() {
        parent::__clone();
    }

    public function setIdUser($id)
    {
      // L'identifiant du personnage sera, quoi qu'il arrive, un nombre entier.
      $this->_idUser = (int) $id;
    }
          

    public function idUser() { return $this->_idUser; }


    /**
     * Get the value of _userName
     */ 
    public function userName() { return $this->_userName; }

    /**
     * Set the value of _userName
     *
     * @return  self
     */ 
    public function setUserName($_userName)
    {
        $this->_userName = $_userName;

        return $this;
    }

    /**
     * Get the value of _email
     */ 
    public function email() { return $this->_email; }

    /**
     * Set the value of _email
     *
     * @return  self
     */ 
    public function setEmail($_email)
    {
        $this->_email = $_email;

        return $this;
    }

    /**
     * Get the value of _password
     */ 
    public function password() { return $this->_password; }

    /**
     * Set the value of _password
     *
     * @return  self
     */ 
    public function setPassword($_password)
    {
        $this->_password = $_password;

        return $this;
    }

    /**
     * Get the value of _idCourtier
     */ 
    public function idCourtier()
    {
        return $this->_idCourtier;
    }

    /**
     * Set the value of _idCourtier
     *
     * @return  self
     */ 
    public function setIdCourtier($_idCourtier)
    {
        $this->_idCourtier = $_idCourtier;

        return $this;
    }


    public function isCourtier(){
        return idCourtier() > 0;
    }
}

?>