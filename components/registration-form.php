<!-- Modal Registration -->
<div id="runDivReg" class="modal">
    <form id="register" action="../includes/registration.php" name="register" method="post">
        <div class="modal-background"></div>
        <div class="modal-card">
            <!-- Registration Title -->
            <header class="modal-card-head">
                <p class="modal-card-title">Registration</p>
                <button class="delete" aria-label="close" onclick="modalToggleReg()"></button>
            </header>
            <!-- JS/PHP Lots of stuff here -->
            <div class="modal-card-body">
                <div class="field is-horizontal">
                    <div class="form-body">
                        <!-- Username Textfield -->
                        <div class="field">
                            <label class="label">Choose a unique Hunter ID</label>
                            <p class="control has-icons-left has-icons-right">
                                <!-- JS/PHP Add "is-success" to input if username is avialable | Add "is-danger" if username is not available-->
                                <input class="input" type="text" placeholder="i.e Metalmine" name="username" id="username" maxlength="60">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                                <span class="icon is-small is-right">
                                    <!-- JS/PHP "fa-check" if username is free, "fa-exclamation-triangle" if username is not available-->
                                    <i class="fas fa-check"></i>
                                </span>
                                <span id='register_username_errorloc' class="help is-danger"></span>

                            </p>
                            <!-- JS/PHP this appears when username is available: <p class="help is-success"> This username is available</p> -->
                            <!--<p class="help is-success"> This username is available</p>-->
                            <!-- JS/PHP this appears when username is taken: <p class="help is-danger"> This username is unavailable</p>-->
                        </div>
                        <!-- Email Textfield -->
                        <div class="field">
                            <label class="label">Email Address</label>
                            <p class="control has-icons-left has-icons-right">
                                <!-- JS/PHP Add "is-success" to input if username is avialable | Add "is-danger" if username is not available-->
                                <input class="input" type="text" placeholder="i.e example@email.com" name="email" id="emailReg" maxlength="60">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <span class="icon is-small is-right">
                                    <!-- JS/PHP "fa-check" if username is free, "fa-exclamation-triangle" if username is not available-->
                                    <i class="fas fa-check"></i>
                                </span>
                                <span id='register_email_errorloc' class="help is-danger"></span>
                            </p>
                            <!-- JS/PHP this appears when username is available: <p class="help is-success"> This email is unavailable</p> -->
                            <!--   <p class="help is-success"> This email is available</p>-->
                            <!-- JS/PHP this appears when username is taken: <p class="help is-danger"> This username is available</p>-->
                        </div>
                        <!-- Password Textfield -->
                        <div class="field">
                            <label class="label"> Password </label>
                            <p class="control has-icons-left">
                                <input class="input" type="password" name="password" id="passwordReg" maxlength="60">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <span id='register_password_errorloc' class="help is-danger"></span>
                            </p>
                        </div>
                        <!-- Password Confirmation Textfield: Display a check mark if it matches the Password Textfield -->
                        <div class="field">
                            <label class="label"> Confirm Password </label>
                            <p class="control has-icons-left">
                                <input class="input" type="Password" name="confirmPassword" id="confirmPassword" maxlength="60">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <span id='register_confirmPassword_errorloc' class="help is-danger"></span>
                            </p>
                        </div>
                        <!-- Platform ID Textfield -->
                        <label class="label"> Select Platform</label>
                        <div class="field has-addons" >
                            <p class="control">
                                <span class="select">
                                    <select name="platform" id="platform">
                                        <option value="pc">PC / Laptop</option>
                                        <option value="xbox">XBox One</option>
                                        <option value="playstaion">Playstaion 4</option>
                                    </select>
                                </span>
                            </p>
                            <p class="control">
                                <input class="input" type="text" placeholder="Platform Name/ID" name="platformId" id="platformId" maxlength="60">
                                <span id='register_platformId_errorloc' class="help is-danger"><?=$platformId_error;?></span>
                            </p>
                        </div>
                        <div class="g-recaptcha" data-sitekey=" 6LcjSmEUAAAAADDdufH1L0nMO8fOdzn0Ca9PhFXv"></div>
                    </div>
                </div>
                <div class="modal-card-foot">
                    <div class="field">
                        <p class="control">
                            <button class="button is-success" type="submit"  value="Submit">Register</button>
                            <button class="button is-success">Cancel</button>
                        </p>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                var frmvalidator  = new Validator("register");
                frmvalidator.EnableOnPageErrorDisplay();
                frmvalidator.EnableMsgsTogether();
                frmvalidator.addValidation("username","req","Please provide your username");
                frmvalidator.addValidation("email","req","Please provide your email address");
                frmvalidator.addValidation("email","email","Please provide a valid email address");
                frmvalidator.addValidation("password","req","Please provide a password");
                frmvalidator.addValidation("confirmPassword","eqelmnt=password","The confirmed password is not same as password");
                frmvalidator.addValidation("platformId","req","Please provide your Platform Name/ID");
            </script>
        </div>
    </form>
</div>
