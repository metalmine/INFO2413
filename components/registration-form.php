<!-- Modal Registration -->
<div id="runDivReg" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <!-- Registration Title -->
        <header class="modal-card-head">
            <p class="modal-card-title">Registration</p>
            <button class="delete" aria-label="close" onclick="modalToggleReg()"></button>
        </header>
        <!-- JS/PHP Lots of stuff here -->
        <form class="modal-card-body">
            <div class="field is-horizontal">
                <div class="form-body">
                    <!-- Username Textfield -->
                    <div class="field">
                        <label class="label">Choose a unique Hunter ID</label>
                        <p class="control has-icons-left has-icons-right">
                            <!-- JS/PHP Add "is-success" to input if username is avialable | Add "is-danger" if username is not available-->
                            <input class="input" type="userName" placeholder="i.e Metalmine">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                            <span class="icon is-small is-right">
                                <!-- JS/PHP "fa-check" if username is free, "fa-exclamation-triangle" if username is not available-->
                                <i class="fas fa-check"></i>
                            </span>
                        </p>
                        <!-- JS/PHP this appears when username is available: <p class="help is-success"> This username is available</p> -->
                        <p class="help is-success"> This username is available</p>
                        <!-- JS/PHP this appears when username is taken: <p class="help is-danger"> This username is available</p>-->
                    </div>
                    <!-- Email Textfield -->
                    <div class="field">
                        <label class="label">Email Address</label>
                        <p class="control has-icons-left has-icons-right">
                            <!-- JS/PHP Add "is-success" to input if email is avialable | Add "is-danger" if email is not available-->
                            <input class="input" type="email" placeholder="i.e example@gmail.com">
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <span class="icon is-small is-right">
                                <!-- JS/PHP "fa-check" if email is free, "fa-exclamation-triangle" if email is not available-->
                                <i class="fas fa-check"></i>
                            </span>
                        </p>
                        <!-- JS/PHP this appears when email is available: <p class="help is-success"> This email is available</p> -->
                        <p class="help is-success"> This email is available</p>
                        <!-- JS/PHP this appears when email is taken: <p class="help is-danger"> This email is unavailable</p>-->
                    </div>
                    <!-- Password Textfield -->
                    <div class="field">
                        <label class="label"> Password </label>
                        <p class="control has-icons-left">
                            <input class="input" type="password">
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </p>
                    </div>
                    <!-- Password Confirmation Textfield: Display a check mark if it matches the Password Textfield -->
                    <div class="field">
                        <label class="label"> Confirm Password </label>
                        <p class="control has-icons-left">
                            <input class="input" type="confirmPassword">
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </p>
                    </div>
                    <!-- Platform ID Textfield -->
                    <label class="label"> Select Platform</label>
                    <div class="field has-addons" >
                        <p class="control">
                            <span class="select">
                                <select>
                                    <option>PC / Laptop</option>
                                    <option>XBox One</option>
                                    <option>Playstaion 4</option>
                                </select>
                            </span>
                        </p>
                        <p class="control">
                            <input class="input" type="platformIDRegister" placeholder="Platform Name/ID">
                        </p>
                    </div>
                    <form action="?" method="POST">
                        <div class="g-recaptcha" data-sitekey=" 6LcjSmEUAAAAADDdufH1L0nMO8fOdzn0Ca9PhFXv"></div>
                        <input type="submit" value="Submit" class="button is-dark">
                    </form>
                </div>
            </div>
        </form>
        <form class="modal-card-foot">
            <div class="field">
                <p class="control">
                    <button class="button is-success">Register</button>
                </p>
            </div>
        </form>
    </div>
</div>
