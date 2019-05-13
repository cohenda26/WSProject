<?php
//=================================================================
//                   CLASS MANAGER - Question des devis
//=================================================================
class QuestionManager extends Model {

    public static function getNewInstance(){
        return new QuestionManager('tsysquestion', 'Question', 'idsysQuestion');
    } 

    protected function getListPropertyTable(){
        $p = ['question'
        ];
        return $p;
    }

    function getListForDevisHabitation(){
        $this->activeBddConnexion();
        $question = $this->get();

        $reponseManager = ReponseQuestionManager::getNewInstance();
        $reponse = $reponseManager.get();

        $list = [];
        for($i=0 ; $i<count($question) ; $i++) 
        { 
           // $list[$question[i]->idsysQuestion()]
        }
    }
}


?>