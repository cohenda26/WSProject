<?php

//=================================================================
//                   CLASS OBJET - Question
//=================================================================
class Question extends DBOject{
    private $_idSysQuestion = 0;
    private $_question = "";

    public function idSysQuestion() { return $this->_idsysQuestion; }

    public function setIdSysQuestion($_idsysQuestion)
    {
        $this->_idsysQuestion = $_idsysQuestion;

        return $this;
    }

    public function question() { return $this->_question; }

    public function setQuestion($_question)
    {
        $this->_question = $_question;

        return $this;
    }
}

?>