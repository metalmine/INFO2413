<!DOCTYPE HTML>
<html lang="en">
    <head>
        <TITLE> MHW Run Agregator</TITLE>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
        <link rel="stylesheet" href="Assets/CSS/style.css">
        <style>

        </style>
        <script>
            function modalToggleRun() {
                var element = document.getElementById("runDivRun");
                element.classList.toggle("is-active");
            }
            function modalToggleLogin() {
                var element = document.getElementById("runDivLogin");
                element.classList.toggle("is-active");
            }
            function modalToggleReg() {
                var element = document.getElementById("runDivReg");
                element.classList.toggle("is-active");
            }
        </script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <Body>
        <div>
            <!-- Main container -->
            <nav class="navbar is-dark" role="navigation" aria-label="main navigation">
                <div class="navbar-brand">
                    <figure class="image responsive">
                        <img src="Assets/logo/logo.png">
                    </figure>
                    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
                        <span aria-hidden="true">Home</span>
                        <span aria-hidden="true">Submit Run</span>
                        <span aria-hidden="true">Account</span>
                        <span aria-hidden="true">Login</span>
                        <span aria-hidden="true">Registration</span>
                    </a>
                </div>
                <nav class="level navbar-menu container">
                    <div class="level-left">
                        <p class="level-item">
                            <a class="button is-dark">Home</button>
                        </p>
                        <!-- Hidden when Logged in-->
                        <p class="level-item">
                            <a class="button is-dark" onclick="modalToggleLogin()">Login</a>
                        </p>
                        <p class="level-item">
                            <a class="button is-dark" onclick="modalToggleReg()">Register</a>
                        </p>
                        <!-- Hidden when Logged out-->
                        <p class="level-item"><a class="button is-dark">Account</a></p>

                    </div>
                    <div class="level-right">
                        <p class="level-item has-text-centered">
                            <a class="button is-primary modal-button" data-target="modal" aria-haspopup="true" onclick="modalToggleRun()">New Run</a>
                        </p>
                    </div>
                </nav>
            </nav>
            <!-- Run Filter -->
            <section class="hero is-dark is-bold">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title is-white">
                            SpeedRun Comparator
                        </h1>
                        <h2 class="subtitle">
                            Filters
                        </h2>
                        <!-- Filter options -->
                        <div>
                            <form class="container">
                                <div class="select">
                                    <select>
                                        <!-- Use JS to grab list of monsters available and add them as options-->
                                        <option> Select Monster</option>
                                    </select>
                                </div>
                                <div class="select">
                                    <select>
                                        <!-- Use JS to grab list of weapon types available and add them as options-->
                                        <option> Select Weapon Type</option>
                                    </select>
                                </div>
                                <div class="select">
                                    <select>
                                        <!-- Use JS to grab list of weapons available and add them as options-->
                                        <option> Select Weapon</option>
                                    </select>
                                </div>
                                <div class="select">
                                    <select>
                                        <!-- Difficulty Options -->
                                        <option> Select Difficulty</option>
                                        <option> Low </option>
                                        <option> High </option>
                                        <option> Tempered </option>
                                    </select>
                                </div>
                                <div>
                                    <div class="field" id="playerFieldWidth">
                                        <div class="control">
                                            <input class="input is-rounded" type="text" placeholder="Hunter ID">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Data Display -->
            <section role="main container">
                <!-- Summar Card -->
                <div class="card has-text-centered is-wide">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            <h1>
                                Weapon Use Chart
                            </h1>
                        </div>
                        <div class="content">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>ID</th>
                                        <th>Speed</th>
                                        <th>Weapon</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- replace # with a number-->
                    <footer class="card-footer">
                        <a hreff="#" class="card-footer-item">Hunters: #</a>
                        <a hreff="#" class="card-footer-item">Runs: #</a>
                    </footer>
                </div>
                <!-- Insert Graph Here -->
                <!-- Insert List Here -->
            </section>
            <hr>
            <!-- Modal Runs -->
            <div id="runDivRun" class="modal">
                <p class"is-unselectable modalTitle">Submit New Run</p>
                <div class="modal-background"></div>
                <div class="modal-content">
                    <div id="runSubmitPopOut">
                        <div class="inputBar">
                            <div class="control">
                                <div class="select">
                                    <select name="characterName">
                                        <option>Pick Character</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="inputBar">
                            <div class="control">
                                <div class="select">
                                    <select name="platformID">
                                        <option>Pick Platform ID</option>
                                    </select>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="inputBar">
                            <div class="control">
                                <div class="select">
                                    <select name="platform">
                                        <option>Platform</option>
                                        <option  value="ps4">PS4</option>
                                        <option  value="xbone">Xbox ONE</option>
                                        <option	 value="pc">PC</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="inputBar">
                            <div class="control">
                                <div class="select">
                                    <select name="weapon">
                                        <option>Weapon</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div>
                            Rank:
                        </div>
                        <div class="control">
                            <label class="radio">
                                <input  id="l" type="radio" name="rank" value="low" checked>
                                L
                            </label>

                            <label class="radio">
                                <input id="h" type="radio" name="rank" value="high">
                                H
                            </label>

                            <label class="radio">
                                <input id="t" type="radio" name="rank" value="tempered">
                                T
                            </label>
                        </div>
                        <br>
                        <div class="control">
                            <div class="select">
                                <select name="map">
                                    <option>Map</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <!--Insert List of Monsters here available in the difficulty level selected.-->
                        <div class="control">
                            <div class="select">
                                <select name="monster">
                                    <option>Monster       </option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <button class="button is-success">Submit Run</button>
                    </div>
                    <button class="modal-close is-large" aria-label="close" onclick="modalToggleRun()"></button>
                </div>
            </div>
            <!-- Modal Login -->
            <div id="runDivLogin" class="modal">
                <form>
                    <p class="is-unselectable modalTitle">Login</p>
                    <div class="modal-background"></div>
                    <div class="modal-content">
                        <div id="runSubmitPopOut">
                            <div>
                                <h3 align=CENTER>Login</h3>
                                <div class="field" id="loginBar">
                                    <p class="control has-icons-left has-icons-right">
                                        <input class="input" type="email" placeholder="Email">
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <span class="icon is-small is-right">
                                            <i class="fas fa-check"></i>
                                        </span>
                                    </p>
                                </div>
                                <div class="field" id="loginBar">
                                    <p class="control has-icons-left">
                                        <input class="input" type="password" placeholder="Password">
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </p>
                                </div>
                                <div class="field">
                                    <p class="control">
                                        <button class="button is-success">
                                            Login
                                        </button>
                                    </p>
                                </div>
                            </div>
                            <button class="modal-close is-large" aria-label="close" onclick="modalToggleLogin()"></button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Modal Registration -->
            <div id="runDivReg" class="modal">
                <div class="modal-background"></div>
                <div class="modal-content">
                    <div id="runSubmitPopOut">
                        <form>
                            <p class="is-unselectable modalTitle">Register</p>
                            <!-- Username Textfield -->
                            <div class="field" id="loginBar">
                                <p class="control has-icons-left has-icons-right">
                                    <input class="input" type="userName" placeholder="Hunter ID">
                                </p>
                            </div>
                            <!-- Email Textfield -->
                            <div class="field" id="loginBar">
                                <p class="control has-icons-left has-icons-right">
                                    <input class="input" type="email" placeholder="Email">
                                </p>
                            </div>
                            <!-- Password Textfield -->
                            <div class="field" id="loginBar">
                                <p class="control has-icons-left">
                                    <input class="input" type="password" placeholder="Password">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </p>
                            </div>
                            <!-- Password Confirmation Textfield: Display a check mark if it matches the Password Textfield -->
                            <div class="field" id="loginBar">
                                <p class="control has-icons-left">
                                    <input class="input" type="confirmPassword" placeholder="Confirm Password">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </p>
                            </div>
                            <!-- Primary Platform Selection -->
                            <div class="inputBar" id="loginBar">
                                <div class="control">
                                    <div class="select">
                                        <select name="platformRegister">
                                            <option>Select Your Game Primary Platform</option>
                                            <option>Playstation 4</option>
                                            <option>Laptop / Desktop Computer</option>
                                            <option>XBox One</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Platform ID Textfield -->
                            <div class="field" id="loginBar">
                                <p class="control has-icons-left">
                                    <input class="input" type="platformIDRegister" placeholder="Platform Name/ID">
                                </p>
                            </div>
                            <hr>
                            <form action="?" method="POST">
                                <div class="g-recaptcha" data-sitekey=" 6LcjSmEUAAAAADDdufH1L0nMO8fOdzn0Ca9PhFXv"></div>
                                <input type="submit" value="Submit" id="loginBar" class="button is-outlined is-primary">
                            </form>
                            <hr>
                            <div class="field">
                                <p class="control">
                                    <button class="button is-success" id="loginBar">Register</button>
                                </p>
                            </div>
                        </form>
                    </div>
                    <button class="modal-close is-large" aria-label="close" onclick="modalToggleReg()"></button>
                </div>
                <button class="modal-close is-large" aria-label="close" onclick="modalToggleReg()"></button>
            </div>
        </div>
    </Body>
</html>
