<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!-- Bulma Set-up -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>MHData</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

        <!-- Javascript Imports -->
        <script src="js/modal.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="js/navburger.js"></script>
    </head>
    <Body>
        <!-- Main container -->
        <section class="hero is-transparent">
            <!-- Navigation -->
            <div class="hero-head">
                <nav class="navbar">
                    <div class="container">
                        <!-- Logo and Burger-->
                        <div class="navbar-brand">
                            <figure class="image responsive">
                                <img src="Assets/logo/logo.png">
                            </figure>
                            <!-- Navbar Buttons -->
                            <div class="navbar-burger" aria-label="menu" aria-expanded="false">
                                <span aria-hidden="true">Home</span>
                                <span aria-hidden="true">Submit Run</span>
                                <!-- Show when Logged in -->
                                <span aria-hidden="true" class="is-hidden">Account</span>
                                <!-- Show when Logged out -->
                                <span aria-hidden="true">Login</span>
                                <span aria-hidden="true">Registration</span>
                            </div>
                        </div>
                        <!-- Desktop Menu-->
                        <div id="navbarMenuHeroA" class="navbar-menu">
                            <div class="navbar-end">
                                <!-- Show when Logged out -->
                                <p class="level-item">
                                    <a class="button is-light is-rounded" onclick="modalToggleLogin()">Login</a>
                                </p>
                                <p class="level-item">
                                    <a class="button is-rounded" onclick="modalToggleReg()">Register</a>
                                </p>
                                <!-- Show when Logged in -->
                                <p class="level-item"><a class="button is-dark is-hidden">Account</a></p>
                                <p class="level-item">
                                    <a class="button is-primary modal-button is-large is-rounded" data-target="modal" aria-haspopup="true" onclick="modalToggleRun()">New Run</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Filters and Content -->
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title is-white is-unselectable">
                        SpeedRun Comparator
                    </h1>
                    <h2 class="subtitle is-unselectable">
                        Filters
                    </h2>
                    <!-- Filter options -->
                    <div>
                        <form class="field">
                            <div class="form-body">
                                <div class="field-body">
                                    <!-- Monster Selection -->
                                    <div class="field-label is-normal">
                                        <label class="label is-unselectable">Monster</label>
                                    </div>
                                    <div class="field has-addons">
                                        <p class="control">
                                            <span class="select">
                                                <select>
                                                    <option> Low</option>
                                                    <option> High</option>
                                                    <option> Temp</option>
                                                </select>
                                            </span>
                                        </p>
                                        <p class="control">
                                            <span class="select">
                                                <select>
                                                    <!-- Use JS to grab list of monsters available and add them as options-->
                                                    <option> Select Monster</option>
                                                </select>
                                            </span>
                                        </p>
                                        <p class="control">
                                            <a class="button is-primary">
                                                Search
                                            </a>
                                        </p>
                                    </div>
                                    <!-- Weapon Selection -->
                                    <div class="field-label is-normal">
                                        <label class="label is-unselectable">Weapon</label>
                                    </div>
                                    <div class="field has-addons">
                                        <p class="control">
                                            <span class="select">
                                                <select>
                                                    <!-- Insert Weapon Types here i.e. GSD -->
                                                    <option> WEP </option>
                                                </select>
                                            </span>
                                        </p>
                                        <p class="control">
                                            <span class="select">
                                                <select>
                                                    <!-- Use JS to grab list of weapons of said type available and add them as options-->
                                                    <option> Select Weapon</option>
                                                </select>
                                            </span>
                                        </p>
                                        <p class="control">
                                            <a class="button is-primary">
                                                Search
                                            </a>
                                        </p>
                                    </div>
                                    <!-- Hunter Search -->
                                    <div class="field-label is-norml">
                                        <label class="label is-unselectable">Hunter</label>
                                    </div>
                                    <div class="field has-addons">
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Hunter ID / Empty for All">
                                        </div>
                                        <div class="control">
                                            <a class="button">
                                                Filter
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <section role="main container">
                    <!-- Summary Card -->
                    <div class="tile">
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
                    </div>
                    <!-- Insert Graph Here -->
                    <div class="tile">

                    </div>
                    <!-- Insert List Here -->
                    <div class="tile">

                    </div>
                </section>
            </div>
            <!-- About Us Information -->
            <div class="hero-foot"></div>
        </section>
        <!-- Modal Runs -->
        <div id="runDivRun" class="modal">
            <label class="label"> Submit New Run </label>
            <div class="modal-background"></div>
            <div class="modal-card">\
                <!-- Run Submission Title-->
                <header class="modal-card-head">
                    <p class="modal-card-title">Submit New Run</p>
                    <button class="delete" aria-label="close" onclick="modalToggleRun()"></button>
                </header>
                <!-- Run Submission Form -->
                <section class="modal-card-body"> 
                    <form>
                        <label class="label">Character</label>
                        <div class="field has-addons">

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
                            <div class="control">
                                <div class="input">
                                    <input class="input is-dark" type="text" placeholder="Platform ID">
                                </div>
                            </div>
                            <div class="control">
                                <div class="select is-fullwidth">
                                    <select name="character">
                                        <option>Select Character</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <label class="label">Weapon</label>
                        <div class="field has-addons">
                            <div class="inputBar">
                                <div class="control">
                                    <div class="select">
                                        <select name="weapon">
                                            <option>Weapon</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label class="label">Rank</label>
                        <div class="field">
                            <div class="control">
                                <div class="select">
                                    <select name="selectRank">
                                        <option>Low</option>
                                        <option>High</option>
                                        <option>Tempered</option>
                                    </select>
                                </div>
                            </div>	
                        </div>
                        <label class="label">Monster</label>
                        <div class="field has-addons">
                            <div class="control">
                                <div class="select">
                                    <select name="map">
                                        <option>Map</option>
                                    </select>
                                </div>
                            </div>
                            <!--Insert List of Monsters here available in the difficulty level selected.-->
                            <div class="control">
                                <div class="select">
                                    <select name="monster">
                                        <option>Monster       </option>	
                                    </select>    
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
                <footer class="modal-card-foot">
                    <!-- add class: is-loading while processing and close it if successful-->
                    <button class="button is-success">Submit Run</button>
                </footer>
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
                <form class="field is-horizontal">
                    <div class="form-body">
                        <p class="is-unselectable modalTitle">Register</p>
                        <!-- Username Textfield -->
                        <div class="field" id="loginBar">
                            <label class="label">Choose a unique Hunter ID</label>
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
                        <!-- Platform ID Textfield -->
                        <div class="field has-addons" id="loginBar">
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
                    </div>
                </form>
            </div>
            <button class="modal-close is-large" aria-label="close" onclick="modalToggleReg()"></button>
        </div>  
    </Body>
</html>