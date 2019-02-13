<!-- --------------------------------------------------------   -->
<!-- Modal HTML Markup                                          -->
<!-- https://vegibit.com/bootstrap-modal-form-examples/         -->
<!-- --------------------------------------------------------   -->
<div id="ModalConnexion" class="modal fade">
    <div class="modal-dialog" role="document">

        <!-- Modal de login d'un utilisateur déjà enregistré -->
        <div id="userLogin" class="d-none userIdentification modal-content">
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
                            <input type="email" class="form-control input-lg" name="email" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <div>
                            <input type="password" class="form-control input-lg" name="password">
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
                            <button type="submit" class="btn btn-success"  name="login_user">Login</button>

                            <a class="btn btn-link" href="">Forgot Your Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->        

        <!-- Modal d'enregistrement d'un nouvel utilisateur  -->
        <div id="userSignIn" class="d-none userIdentification modal-content po-relative">
            <div class="modal-header">
                <h1 class="modal-title">Login</h1>
                <a href="#" class="close-btn" data-dismiss="modal" aria-hidden="true">×</a>
            </div>
            
            <div class="modal-body">
                <form role="form" method="POST" action="<?=HOST?>user/register">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="username" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">E-Mail Address</label>
                        <div>
                            <input type="email" class="form-control input-lg" name="email" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <div>
                            <input type="password" class="form-control input-lg" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Confirm Password</label>
                        <div>
                            <input type="password" class="form-control input-lg" name="password_confirmation">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->

        <!-- Modal d'enregistrement d'un nouveau partenaire  -->
        <div id="userPartenaireSignIn" class="d-none userIdentification modal-content po-relative">
            <div class="modal-header">
                <h1 class="modal-title">New partenaire</h1>
                <a href="#" class="close-btn" data-dismiss="modal" aria-hidden="true">×</a>
            </div>
            
            <div class="modal-body">
                <form role="form" method="POST" action="<?=HOST?>user/registerPartenaire">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Numessek</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="numEssek" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="userName" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">E-Mail Address</label>
                        <div>
                            <input type="email" class="form-control input-lg" name="email" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <div>
                            <input type="password" class="form-control input-lg" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Confirm Password</label>
                        <div>
                            <input type="password" class="form-control input-lg" name="password_confirmation">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-danger-gradiant">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->

        <!-- Modal HTML Markup -->
        <div id="userNotFoundCreate" class="d-none userIdentification modal-content">
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
