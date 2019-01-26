<?php

class UserManager extends Model {

    public function getUser($data){
        $this->getBdd();
        $user = $this->get("tuser", "email", "User", $data['email']);
        if (isset($user) && count($user) == 1){
            if ($user[0]->password() == $data['password']){
                return $user[0];
            }
            else {
                throw new Exception (' Utilisateur inexistant');
            }
        }
        else {
            throw new Exception (' Utilisateur non trouvé');
        }

    }
}

?>