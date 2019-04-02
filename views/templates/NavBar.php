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

                <ul class="navbar-nav ml-auto">
                    <div class="navbar-menu-courtier d-none">
                        <li class="nav-item"><a href="<?=HOST?>courtier/EspaceProfessionnel" class="nav-link">Espace Professionnel</a></li>
                        <!-- <li><a href="<?=HOST?>courtier/listclients" target="_blank">Liste</a></li> -->
                    </div>

                    <div class="navbar-menu-client d-none">
                        <li class="nav-item"><a href="<?=HOST?>client/EspacePersonnel" class="nav-link">Espace Personnel</a></li>
                    </div>
                </ul>

                <div class="navbar-menu-courtier d-none">
                    <div class="form-inline ml-auto authentication-box">
                        <button class="btn btn-sm btn-outline-success mr-sm-2 btn-logout"  onclick="location.href='<?=HOST?>'">Logout</button>
                    </div>
                </div>
                <div class="navbar-menu-client d-none">
                    <div class="form-inline ml-auto authentication-box">
                        <button class="btn btn-sm btn-outline-success mr-sm-2 btn-logout"  onclick="location.href='<?=HOST?>'">Logout</button>
                    </div>
                </div>
                <div class="navbar-btn-connexion">
                    <div class="form-inline ml-auto authentication-box">
                        <button class="btn btn-sm btn-outline-success mr-sm-2" type="submit" data-toggle="modal" data-target="#ModalConnexion" data-user="userLogin">Login</button>
                        <button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit" data-toggle="modal" data-target="#ModalConnexion" data-user="userSignIn">Register</button>
                    </div>
                </div>
                <!-- <ul class="ml-auto list-inline authentication-box">
                    <li class="nav-item list-inline "><a class="nav-link btn btn-success-gradiant font-14 b-l" href="#">Login</a></li>
                    <li class="nav-item list-inline "><a class="nav-link btn btn-success-gradiant font-14 b-l" href="#">Register</a></li>
                </ul> -->
            
            </div>
        </nav>
    </div>
</div>





