<div class="h3-navbar">
    <div class="container">
        <nav class="navbar navbar-expand-lg h3-nav">
            <a class="navbar-brand" href="<?=HOST?>"><img src="<?=ASSETS?>images/logos/medic-logo.png" alt="Bitouel" /><br><img src="<?=ASSETS?>images/logos/logo-dark-text.jpg" class="spare-text m-t-10" alt="image"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header3" aria-controls="header3" aria-expanded="false" aria-label="Toggle navigation"><span class="ti-menu"></span></button>
            <div class="collapse navbar-collapse hover-dropdown" id="header3">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown"> 
                        <a class="nav-link dropdown-toggle" href="#" id="h6-mega-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Assurances <i class="fa fa-angle-down m-l-5"></i>
                        </a>
                        <ul class="b-none dropdown-menu font-14 animated fadeInUp">
                            <li><a class="dropdown-item" href="<?=HOST?>Home/assuranceHabitation" target="_blank">Habitation</a></li>
                            <li><a class="dropdown-item" href="<?=HOST?>Home/assuranceHypotheque" target="_blank">Hypothèque</a></li>
                            <li class="divider" role="separator"></li>
                            <li><a class="dropdown-item" href="<?=HOST?>Home/assuranceVoiture" target="_blank">Voiture</a></li>
                            <li><a class="dropdown-item" href="<?=HOST?>Home/assuranceVoyage" target="_blank">Voyage</a></li>
                            <li class="divider" role="separator"></li>
                            <li><a class="dropdown-item" ref="<?=HOST?>Home/assuranceSante" target="_blank">Santé</a></li>
                            <li><a class="dropdown-item" href="<?=HOST?>Home/assuranceVie" target="_blank">Vie</a></li>
                        </ul>
                    </li>
                </ul>

<?php 
        if ( UserManager::getSessionUser() ) { 
            if ( UserManager::getSessionCourtier()) {
?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown mega-dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="h6-mega-dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mon espace <i class="fa fa-angle-down m-l-5"></i>
                        </a>
                        <div class="dropdown-menu b-none font-14 animated fadeInUp" aria-labelledby="h6-mega-dropdown1">
                            <div class="row">
                                <div class="col-lg-4 inside-bg hidden-md-down">
                                    <div class="bg-img" style="background-image:url(<?=ASSETS?>images/mega-bg2.jpg)">
                                        <h3 class="text-dark font-light">Espace professionnel </h3> </div>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <ul class="list-style-none">
                                        <li> <h6>Les demandes clients </h6></li>
                                        <li><a href="#" target="_blank">en attente</a></li>
                                        <li><a href="#" target="_blank">acceptées</a></li>
                                        <li><a href="#" target="_blank">refusées</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <ul class="list-style-none">
                                        <li> <h6>Mes clients </h6></li>
                                        <li><a href="<?=HOST?>courtier/listclients" target="_blank">Liste</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <ul class="list-style-none">
                                        <li>  <h6>Mes sinistres</h6></li>
                                        <li><a href="#" target="_blank">Habitation</a></li>
                                        <li><a href="#" target="_blank">Hypothèque</a></li>
                                        <li><a href="#" target="_blank">Voiture</a></li>
                                        <li><a href="#" target="_blank">Voyage</a></li>
                                        <li><a href="#" target="_blank">Santé</a></li>
                                        <li><a href="#" target="_blank">Vie</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- 
                    <li class="nav-item list-inline authentication-box"><a class="nav-link btn btn-success-gradiant font-14 b-l" href="<?=HOST?>user/logout">Logout</a></li> 
                    -->
                    <div class="form-inline ml-auto authentication-box">
                        <button class="btn btn-sm btn-outline-success mr-sm-2"  onclick="location.href='<?=HOST?>user/logout'">Logout</button>
                    </div>
                </ul>
<?php
            }
            
            if ( UserManager::getSessionClient()) 
            {
?>                    
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown mega-dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="h6-mega-dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mon espace personnel <i class="fa fa-angle-down m-l-5"></i>
                        </a>
                        <div class="dropdown-menu b-none font-14 animated fadeInUp" aria-labelledby="h6-mega-dropdown1">
                            <div class="row">
                                <div class="col-lg-4 inside-bg hidden-md-down">
                                    <div class="bg-img" style="background-image:url(<?=ASSETS?>images/mega-bg2.jpg)">
                                        <h3 class="text-dark font-light">Espace client </h3> </div>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <ul class="list-style-none">
                                        <li> <h6>Mes demandes</h6></li>
                                        <li><a href="#" target="_blank">en attente</a></li>
                                        <li><a href="#" target="_blank">acceptées</a></li>
                                        <li><a href="#" target="_blank">refusées</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <ul class="list-style-none">
                                        <li><a href="<?=HOST?>client/souscrireContratHabitation" target="_blank">Souscrire un contrat d'habitation</a></li>
                                        <li> <h6>Mes contrats</h6></li>
                                        <li><a href="#" target="_blank">Habitation</a></li>
                                        <li><a href="#" target="_blank">Hypothèque</a></li>
                                        <li><a href="#" target="_blank">Voiture</a></li>
                                        <li><a href="#" target="_blank">Voyage</a></li>
                                        <li><a href="#" target="_blank">Santé</a></li>
                                        <li><a href="#" target="_blank">Vie</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <ul class="list-style-none">
                                        <li>  <h6>Mes sinistres</h6></li>
                                        <li><a href="#" target="_blank">Habitation</a></li>
                                        <li><a href="#" target="_blank">Hypothèque</a></li>
                                        <li><a href="#" target="_blank">Voiture</a></li>
                                        <li><a href="#" target="_blank">Voyage</a></li>
                                        <li><a href="#" target="_blank">Santé</a></li>
                                        <li><a href="#" target="_blank">Vie</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- 
                    <li class="nav-item list-inline authentication-box"><a class="nav-link btn btn-success-gradiant font-14 b-l" href="<?=HOST?>user/logout">Logout</a></li> 
                    -->
                    <div class="form-inline ml-auto authentication-box">
                        <button class="btn btn-sm btn-outline-success mr-sm-2"  onclick="location.href='<?=HOST?>user/logout'">Logout</button>
                    </div>
                </ul>
<?php            
            }
        } 
        else 
        {
?>
                <ul class="navbar-nav ml-auto">
                    <div class="form-inline ml-auto authentication-box">
                        <button class="btn btn-sm btn-outline-success mr-sm-2" type="submit" data-toggle="modal" data-target="#ModalConnexion" data-user="userLogin">Login</button>
                        <button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit" data-toggle="modal" data-target="#ModalConnexion" data-user="userSignIn">Register</button>
                    </div>
                </ul>
<?php        
        }           
?>
                <!-- <ul class="ml-auto list-inline authentication-box">
                    <li class="nav-item list-inline "><a class="nav-link btn btn-success-gradiant font-14 b-l" href="#">Login</a></li>
                    <li class="nav-item list-inline "><a class="nav-link btn btn-success-gradiant font-14 b-l" href="#">Register</a></li>
                </ul> -->
            
            </div>
        </nav>
    </div>
</div>





