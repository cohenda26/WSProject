<?php

//=================================================================
//                   CLASS OBJET - User
//=================================================================
class User extends DBObject implements JsonSerializable{
    private $_idUser = 0;
    private $_userName="";
    private $_email = "";
    private $_password="";
    private $_idCourtier=0;
    private $_idClient=0;
    private $_isCourtier = false;
    private $_isClient = false;

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

    public function __construct($datas){
        parent::__construct($datas);
        $this->_isCourtier = $this->isCourtier();
        $this->_isClient = $this->isClient();
    }

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
    public function password() { 
        // $hash_password= hash('sha256', $this->_password);
        // return $hash_password; 
        return $this->_password;
    }

    /**
     * Set the value of _password
     *
     * @return  self
     */ 
    public function setPassword($_password)
    {
        // $hash_password= hash('sha256', $_password);
        // $this->_password = $hash_password;
        $this->_password = $_password;

        return $this;
    }

    /**
     * Get the value of _idCourtier
     */ 
    public function idCourtier()
    {
        if ($this->_idCourtier == 0){
            return null;
        } else 
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

    /**
     * Get the value of _idClient
     */ 
    public function idClient()
    {
        if ($this->_idClient == 0){
            return null;
        } else 
            return $this->_idClient;
    }

    /**
     * Set the value of _idClient
     *
     * @return  self
     */ 
    public function setIdClient($_idClient)
    {
        $this->_idClient = $_idClient;

        return $this;
    }


    public function isCourtier(){
        return $this->idCourtier() > 0;
    }
    
    public function isClient(){
        return $this->idClient() > 0;
    }
}

?>