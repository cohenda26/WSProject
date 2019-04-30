<!-- --------------------------------------------------------   -->
<!-- Modal HTML Markup                                          -->
<!-- https://vegibit.com/bootstrap-modal-form-examples/         -->
<!-- --------------------------------------------------------   -->
<div id="ModalConnexion" class="modal fade">
    <div class="modal-dialog" role="document">

        <!-- Modal de login d'un utilisateur déjà enregistré -->
        <div id="FrmUserLogin" class="d-none userIdentification modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Login</h1>
                <a href="#" class="close-btn" data-dismiss="modal" aria-hidden="true">×</a>
            </div>
            
            <div class="modal-body">
                <!-- <form role="form" method="POST" action="<?=HOST?>user/login">   -->
                <form role="form" method="POST" action="">                
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">E-Mail Address</label>
                        <div>
                            <input type="email"  id="email" class="form-control" name="email" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <div>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success"  name="login">Login</button>

                            <a class="btn btn-link" href="">Forgot Your Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->        

        <!-- Modal d'enregistrement d'un nouvel utilisateur  -->
        <div id="FrmUserSignIn" class="d-none userIdentification modal-content po-relative">
            <div class="modal-header">
                <h1 class="modal-title">Register</h1>
                <a href="#" class="close-btn" data-dismiss="modal" aria-hidden="true">×</a>
            </div>
            
            <div class="modal-body">
                <!-- <form role="form" method="POST" action="<?=HOST?>user/register"> -->
                <form role="form" method="POST" action=""> 
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <div>
                            <input type="text" class="form-control" name="username" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">E-Mail Address</label>
                        <div>
                            <input type="email"  id="email" class="form-control" name="email" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <div>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Confirm Password</label>
                        <div>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success" name="register">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->

        <!-- Modal d'enregistrement d'un nouveau partenaire  -->
        <div id="FrmUserCourtierSignIn" class="d-none userIdentification modal-content po-relative">
            <div class="modal-header">
                <h1 class="modal-title">Nouveau Courtier</h1>
                <a href="#" class="close-btn" data-dismiss="modal" aria-hidden="true">×</a>
            </div>
            
            <div class="modal-body">
                <!-- <form role="form" method="POST" action="<?=HOST?>user/registerPartenaire"> -->
                <form role="form" method="POST" action="" novalidate> 
                    <input type="hidden" name="_token" value="">
                    
                    <div class="form-group">
                        <label class="form-control-label" data-error="wrong" data-success="right">Numéro Essek</label>
                        <input type="text" class="form-control validate" name="numEssek" value="" required>
                        <div class="invalid-feedback"> Merci de remplir le num de Essek </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Username</label>
                        <input type="text" class="form-control" name="userName" value="">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">E-Mail Address</label>
                        <input type="email" id="email" class="form-control" name="email" value="" required>
                        <div class="invalid-feedback"> Merci de remplir l'email </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    <div class="row form-group">
                        <label class="form-control-label" for="adresseCourtier" >Adresse</label>
                        <input class="form-control" type="text" value="" name="adresseNum" id="NumeroRue">
                        <input class="form-control" type="text" value="" name="adresseRue" id="Rue">
                    </div>   
                    <div class="form-group">
                        <label class="form-control-label" for="villeCourtier" >Ville </label>
                        <input class="form-control" type="text" value="" name="adresseVille" id="Ville">
                    </div> 
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger-gradiant" name="registerCourtier"> Register </button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->

        <!-- Modal HTML Markup -->
        <div id="FrmUserNotFoundCreate" class="d-none userIdentification modal-content">
            <div class="modal-header">
                <h4 class="modal-title">See more of this awesome website by logging in</h4>
            </div>
            <div class="modal-body">
                <p class="lead text-xs-center">It only takes a few seconds to level up!</p>
                <div class="lead text-xs-center"><a class="btn btn-info" href="<?=HOST?>/user/register">Create Account</a> or
                    <a class="btn btn-success" href="<?=HOST?>/user/login">Sign In</a></div>
            </div>
            <div class="modal-footer">
                :-)
            </div>
        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
