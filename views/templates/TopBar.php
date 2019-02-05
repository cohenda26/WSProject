<div class="h3-topbar">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <ul class="list-inline">
                    <li><a href="mailto:david@bitouel.com"><i class="icon-Mail info-icon"></i> david@bitouel.com</a></li>
                    <li><a><span class="vdevider"></span></a></li>
                    <li><a href="#"><i class="icon-Phone-2 info-icon"></i> +972 53 708 5055</a></li>
                </ul>
            </div>
            <div class="col-md-7 t-r">
<?php
        $DisplayUser = "";
        $DisplayEssek = "";
        if (isset($_SESSION['currentUser']) ){
            $currentUser = UserManager::getSessionUser();
            $DisplayUser =  'Bienvenue ' . $currentUser->email();
            if (isset($_SESSION['currentCourtier']) ) {
                $currentCourtier = UserManager::getSessionCourtier();
                if (isset($currentCourtier)){
                    $DisplayEssek = $currentCourtier->numEssek();
                }
            }
?>
                <ul class="list-inline">
                    <li><a href="#"><i class="icon-User info-icon"></i> <?=$DisplayUser?></a></li>
                    <li><a><span class="vdevider"></span></a></li>
                    <li><a href="#"> <?=$DisplayEssek?> </a></li>
                </ul>
<?php
        }
        else
        {
?>
                <button class="btn btn-sm btn-danger-gradiant font-14 b-l" type="submit" data-toggle="modal" data-target="#ModalPartenaireSignInForm">Devenez partenaire</button>
                <!-- <ul class="list-inline authentication-box">
                    <li><a href="" class="btn btn-danger-gradiant font-14 b-l" data-toggle="modal" data-target="#ModalPartenaireSignInForm">Devenez partenaire </a></li>
                </ul> -->
<?php
        }
?>
            </div>
        </div>
    </div>
</div>