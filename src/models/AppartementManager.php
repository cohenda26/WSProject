<?php
//=================================================================
//                   CLASS MANAGER - Appartement
//=================================================================
class AppartementManager extends Model {

    public static function getNewInstance(){
        return new AppartementManager('tappartement', 'Appartement', 'idAppartement');
    } 

    protected function getListPropertyTable(){
        $p = ['ville', 'rue', 'numero', 'surface', 'NbPieces', 'anneeConstruction'
        ];
        return $p;
    }

}


?>