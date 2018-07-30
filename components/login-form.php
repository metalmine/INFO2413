<!-- Modal Login -->
<div id="runDivLogin" class="modal">
    <form id="login" action="../includes/login.php" name="login" method="post">
        <div class="modal-background"></div>
        <div class="modal-card">
            <!-- Login Title -->
            <header class="modal-card-head">
                <p class="modal-card-title">Login</p>
                <button class="delete" aria-label="close" onclick="modalToggleLogin()"></button>
            </header>
            <!-- JS/PHP Login Form -->
            <div class="modal-card-body">
                <!-- JS/PHP Email Check-->
                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                        <input class="input" type="text" name="email" placeholder="Email" maxlength="60" id="emailLogin">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                        <span id='register_email_errorloc' class="help is-danger"></span>
                    </p>
                </div>
                <!-- JS/PHP Password Check-->
                <div class="field">
                    <p class="control has-icons-left">
                        <input class="input" type="password" name="password" placeholder="Password" maxlength="60" id="passwordLogin">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                        <span id='register_password_errorloc' class="help is-danger"></span>
                    </p>
                </div>
            </div>
            <footer class="modal-card-foot">
                    <!-- JS/PHP add class: is-loading while processing and close it if successful-->
                    <button class="button is-success" type="submit" name="submit" value="Submit">Login</button>
                    <button class="button is-success" type="reset" onclick="modalToggleLogin()">Cancel</button>
                </footer>
        </div>
    </form>
    <script type="text/javascript">
        var frmvalidator  = new Validator("login");
        frmvalidator.EnableOnPageErrorDisplay();
        frmvalidator.EnableMsgsTogether();
        frmvalidator.addValidation("email","req","Please provide your email address");
        frmvalidator.addValidation("password","req","Please provide a password");
    </script>
</div>
