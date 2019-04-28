<?php
//=================================================================
//                   CLASS MANAGER - ReponseQuestion des devis
//=================================================================
class ReponseQuestionManager extends Model {

    public static function getNewInstance(){
        return new ReponseQuestionManager('tsysreponsequestion', 'ReponseQuestion', 'idsysReponseQuestion');
    } 

    protected function getListPropertyTable(){
        $p = ['reponsequestion', 'idsysquestion'
        ];
        return $p;
    }

}


?>