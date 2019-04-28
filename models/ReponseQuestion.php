<?php

//=================================================================
//                   CLASS OBJET - Question
//=================================================================
class ReponseQuestion extends DBOject{
    private $_idSysReponseQuestion = 0;
    private $_idSysQuestion = 0;
    private $_reponseQuestion = "";

    private $toto = '';


    public function idSysReponseQuestion() { return $this->_idSysReponseQuestion; }

    public function setIdSysReponseQuestion($_idSysReponseQuestion)
    {
        $this->_idSysReponseQuestion = $_idSysReponseQuestion;

        return $this;
    }

    public function idSysQuestion() { return $this->_idSysQuestion; }

    public function setIdSysQuestion($_idSysQuestion)
    {
        $this->_idSysQuestion = $_idSysQuestion;

        return $this;
    }

    public function reponseQuestion() { return $this->_reponseQuestion; }

    public function setReponseQuestion($_reponseQuestion)
    {
        $this->_reponseQuestion = $_reponseQuestion;

        return $this;
    }

}

?>