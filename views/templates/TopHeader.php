<div class="topbar">
    <div class="header3">
        <div class="po-relative">
            <?php
                require(VIEWS."templates/TopBar.php");

                require(VIEWS."templates/NavBar.php");
            ?>                  
        </div>
    </div>
</div>


<!-- --------------------------------------------------------   -->
<!-- Modal HTML Markup                                          -->
<!-- https://vegibit.com/bootstrap-modal-form-examples/         -->
<!-- --------------------------------------------------------   -->

<!-- Modal de login d'un utilisateur déjà enregistré -->
<div id="ModalLoginForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Login</h1>
                <a href="#" class="close-btn" data-dismiss="modal" aria-hidden="true">×</a>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="<?=HOST?>user/login">                
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
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal d'enregistrement d'un nouvel utilisateur  -->
<div id="ModalSignInForm" class="modal fade custom-modal">
    <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content po-relative">
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
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal d'enregistrement d'un nouveau partenaire  -->
<div id="ModalPartenaireSignInForm" class="modal fade custom-modal">
    <div class="modal-dialog modal-lg" role="dialog">
        <div class="modal-content po-relative">
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
                            <input type="text" class="form-control input-lg" name="name" value="">
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
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->