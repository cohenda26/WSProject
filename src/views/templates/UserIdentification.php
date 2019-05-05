<!-- --------------------------------------------------------   -->
<!-- Modal HTML Markup                                          -->
<!-- https://vegibit.com/bootstrap-modal-form-examples/         -->
<!-- --------------------------------------------------------   -->
<div id="ModalConnexion" class="modal fade">
    <div class="modal-dialog" role="document">

        <!-- Modal de login d'un utilisateur déjà enregistré -->
        <div id="FrmUserLogin" class="d-none userIdentification modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Identification</h1>
                <a href="#" class="close-btn" data-dismiss="modal" aria-hidden="true">×</a>
            </div>
            
            <div class="modal-body">
                <form role="form" method="POST" action="" id="UserLogin">                
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">E-Mail </label>
                        <input type="email"  id="emailLogin" class="form-control" name="email" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mot de passe</label>
                        <input type="password" id="passwordLogin" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" disabled> Se souvenir
                            </label>
                        </div>
                    </div>
                    <div class="form-group disabled">
                        <div>
                            <button type="submit" class="btn btn-success"  name="login">S'identifier</button>
                            <a style="pointer-events: none; display: inline-block;" class="btn btn-link" href="">Mot de passe oublié?</a>
                        </div>
                    </div>
                </form> 
            </div>
        </div><!-- /.modal-content -->        

        <!-- Modal d'enregistrement d'un nouvel utilisateur  -->
        <div id="FrmUserSignIn" class="d-none userIdentification modal-content po-relative">
            <div class="modal-header">
                <h1 class="modal-title">Nouveau Client</h1>
                <a href="#" class="close-btn" data-dismiss="modal" aria-hidden="true">×</a>
            </div>
            
            <div class="modal-body">
                <form role="form" method="POST" action="" id="UserSignIn"> 
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Identifiant</label>
                        <input type="text" class="form-control" name="username" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">E-Mail</label>
                        <input type="email"  id="emailSignIn" class="form-control" name="email" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mot de passe</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" name="password_confirmation" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" name="register">
                            S'enregistrer
                        </button>
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
                <form role="form" method="POST" action=""> 
                    <input type="hidden" name="_token" value="">
                    
                    <div class="form-group">
                        <label class="form-control-label" data-error="wrong" data-success="right">Numéro Essek</label>
                        <input type="text" class="form-control" name="numEssek" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Identifiant</label>
                        <input type="text" class="form-control" name="userName" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">E-Mail</label>
                        <input type="email" id="emailCourtier" class="form-control" name="email" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Mot de passe</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" name="password_confirmation" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="adresseCourtier" >Adresse</label>
                        <input class="form-control" type="text" value="" name="numero" id="NumeroRue">
                        <input class="form-control" type="text" value="" name="rue" id="Rue">
                    </div>   
                    <div class="form-group">
                        <label class="form-control-label" for="villeCourtier" >Ville </label>
                        <input class="form-control" type="text" value="" name="ville" id="Ville">
                    </div> 
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger-gradiant" name="registerCourtier"> S'enregistrer </button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->

        <!-- Modal HTML Markup -->
        <div id="FrmUserNotFoundCreate" class="d-none userIdentification modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Authentification nescessaire pour continuer...</h4>
            </div>
            <div class="modal-body">
                <p class="lead text-xs-center">It only takes a few seconds to level up!</p>
                <div class="lead text-xs-center"><a class="btn btn-info" href="<?=HOST?>/user/register">Créer un compte</a> or
                    <a class="btn btn-success" href="<?=HOST?>/user/login">S'authentifier</a></div>
            </div>
            <div class="modal-footer">
                :-)
            </div>
        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
