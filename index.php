<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!-- Google Tracking -->
        <script src="js/gtag.js"></script>
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
        <section class="hero is-light">
            <!-- Navigation -->
            <div class="hero-head">
                <nav class="navbar">
                    <!-- Logo and Burger-->
                    <div class="navbar-brand">
                        <figure class="image responsive">
                            <img src="Assets/logo/logo.png">
                        </figure>
                        <!-- Navbar Buttons -->
                        <!-- JS/PHP  upon clicking, add or remove to appropriate classes below-->
                        <div class="navbar-burger" aria-label="menu" aria-expanded="false">
                            <span id="nav-toggle" class="nav-toggle"></span>
                            <span></span>
                            <span></span>
                            <div id="nav-menu" class="nav-right nav-menu">
                                <a class="nav-item" href="/">
                                    Home
                                </a>
                                <a class="nav-item" onclick="modalToggleLogin()">
                                    Login
                                </a>
                                <a class="nav-item" onclick="modalToggleReg()">
                                    Register
                                </a>
                                <a class="nav-itemis-hidden" href="#linkhere">
                                    Account
                                </a>
                                <a class="nav-item" onclick="modalToggleRun()">
                                    New Run
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Desktop Menu-->
                    <div id="navbarMenuHeroA" class="navbar-menu">
                        <div class="navbar-start">
                            <p class="navbar-item">
                                <a class="button is-dark is-rounded" data-target="modal" aria-haspopup="true" onclick="modalToggleRun()">New Run</a>
                            </p>
                            <!-- Show when Logged out -->
                            <p class="navbar-item">
                                <a class="button is-light is-rounded" onclick="modalToggleLogin()">Login</a>
                            </p>
                            <p class="navbar-item">
                                <a class="button is-light is-rounded" onclick="modalToggleReg()">Register</a>
                            </p>
                            <!-- Show when Logged in -->
                            <p class="navbar-item">
                                <a class="button is-dark is-hidden">Account</a>
                            </p>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Title and Filter -->
            <div class="hero-body">
                <div class="has-text-centered">
                    <h1 class="title is-white is-unselectable">
                        SpeedRun Comparator
                    </h1>
                    <h2 class="subtitle is-unselectable">
                        Filters
                    </h2>
                    <!-- Filter options -->
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
                                        <a class="button is-dark">
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
                                                <!-- JS/PHP Insert Weapon Types here i.e. GSD -->
                                                <option> WEP </option>
                                            </select>
                                        </span>
                                    </p>
                                    <p class="control">
                                        <span class="select">
                                            <select>
                                                <!-- JS/PHP Use JS to grab list of weapons of said type available and add them as options-->
                                                <option> Select Weapon</option>
                                            </select>
                                        </span>
                                    </p>
                                    <p class="control">
                                        <a class="button is-dark">
                                            Search
                                        </a>
                                    </p>
                                </div>
                                <!-- Hunter Search -->
                                <div class="field-label is-normal">
                                    <label class="label is-unselectable">Hunter</label>
                                </div>
                                <div class="field has-addons">
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Hunter ID / Empty for All">
                                    </div>
                                    <div class="control">
                                        <a class="button is-dark">
                                            Filter
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
                <h1 class="has-text-centered has-text-weight-bold">
                    <!-- Replace this with Monster/Hunter ID -->
                    Title
                </h1>
                <hr>
                <!-- Main Container: Tiles / Graphs / Tables -->
                <section role="main container">
                    <!-- Summary Card -->
                    <div class="tile is-ancestor">
                        <div class="tile is-vertical">
                            <div class="tile">
                                <div class="card has-text-centered is-wide">
                                    <div class="card-image">
                                        <!-- JS/PHP Replace this image with the weapon radio chart -->
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
                                                        <th>Medals</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>1</th>
                                                        <td>Metalmine</td>
                                                        <td><a href="/user/Metalmine.php">22</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>2</th>
                                                        <td>ThunderDash247</td>
                                                        <td><a href="/user/ThunderDash247.php">11</a></td>
                                                    </tr>
                                                    <tr>
                                                        <th>3</th>
                                                        <td>TheLegend27</td>
                                                        <td><a href="/user/TheLegend27.php">2</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- JS/PHP replace # with a number-->
                                    <footer class="card-footer">
                                        <a hreff="#" class="card-footer-item">Hunters: #</a>
                                        <a hreff="#" class="card-footer-item">Runs: #</a>
                                    </footer>
                                </div>
                            </div>
                        </div>
                        <!-- JS/PHP JESSICA Insert Graph Here -->
                        <div class="tile is-6">

                        </div>
                        <!-- Insert more tables here -->
                        <div class="tile is-4 is-vertical">
                            <!-- JS/PHP -->
                            <div class="tabs is-toggle is-fullwidth ">
                                <ul>
                                    <!-- JS/PHP Add/Remove "is-active" on tab click -->
                                    <li class="is-active"><a>Weapons</a></li>
                                    <li class=""><a>Players</a></li>
                                    <li class=""><a>Monsters</a></li>
                                </ul>
                            </div>
                            <h1><strong>Tool Assisted Speed Run:</strong></h1>
                            <div class="tabs is-toggle is-toggle-rounded is-small is-centered">
                                <ul>
                                    <!-- JS/PHP Add/Remove "is-active" on click -->
                                    <li class="is-active">
                                        <a>
                                            <span>
                                                Yes
                                            </span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a>
                                            <span>
                                                No
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- JS/PHP replace the data here according to which tab people clicked above -->
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Name</th>
                                        <th>Time/Link</th>
                                        <th>Tags</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- JS/PHP Replace name with links to weapon/monster to wiki and player to account link -->
                                    <tr>
                                        <th>1</th>
                                        <td><a href="https://mhdata.world/Name1">Name 1</a></td>
                                        <td><a href="https://www.youtube.com">00:00</a></td>
                                        <td>Non-TA</td>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <td><a href="https://mhdata.world/Name1">Name 1</a></td>
                                        <td><a href="https://www.youtube.com">00:00</a></td>
                                        <td>Non-TA</td>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <td><a href="https://mhdata.world/Name1">Name 1</a></td>
                                        <td><a href="https://www.youtube.com">00:00</a></td>
                                        <td>Non-TA</td>
                                    </tr>
                                    <tr>
                                        <th>4</th>
                                        <td><a href="https://mhdata.world/Name1">Name 1</a></td>
                                        <td><a href="https://www.youtube.com">00:00</a></td>
                                        <td>Non-TA</td>
                                    </tr>
                                    <tr>
                                        <th>5</th>
                                        <td><a href="https://mhdata.world/Name1">Name 1</a></td>
                                        <td><a href="https://www.youtube.com">00:00</a></td>
                                        <td>Non-TA</td>
                                    </tr>
                                    <tr>
                                        <th>6</th>
                                        <td><a href="https://mhdata.world/Name1">Name 1</a></td>
                                        <td><a href="https://www.youtube.com">00:00</a></td>
                                        <td>Non-TA</td>
                                    </tr>
                                    <tr>
                                        <th>7</th>
                                        <td><a href="https://mhdata.world/Name1">Name 1</a></td>
                                        <td><a href="https://www.youtube.com">00:00</a></td>
                                        <td>Non-TA</td>
                                    </tr>
                                    <tr>
                                        <th>8</th>
                                        <td><a href="https://mhdata.world/Name1">Name 1</a></td>
                                        <td><a href="https://www.youtube.com">00:00</a></td>
                                        <td>Non-TA</td>
                                    </tr>
                                    <tr>
                                        <th>9</th>
                                        <td><a href="https://mhdata.world/Name1">Name 1</a></td>
                                        <td><a href="https://www.youtube.com">00:00</a></td>
                                        <td>Non-TA</td>
                                    </tr>
                                    <tr>
                                        <th>10</th>
                                        <td><a href="https://mhdata.world/Name1">Name 1</a></td>
                                        <td><a href="https://www.youtube.com">00:00</a></td>
                                        <td>Non-TA</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>
            <!-- About Us Information -->
            <div class="hero-foot"></div>
        </section>
        <!-- Modal Runs -->
        <div id="runDivRun" class="modal">
            <div class="modal-background"></div>
            <div class="modal-card">
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
                                    <!-- JS/PHP -->
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
                                    <!-- JS/PHP -->
                                    <input class="input is-dark" type="text" placeholder="Platform ID">
                                </div>
                            </div>
                            <div class="control">
                                <div class="select is-fullwidth">
                                    <!-- JS/PHP -->
                                    <select name="character">
                                        <option>Select Character</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <label class="label">Weapon</label>
                        <div class="field is-grouped">
                            <div class="inputBar">
                                <div class="control">
                                    <div class="select">
                                        <!-- JS/PHP -->
                                        <select name="weapon">
                                            <option>Select Weapon</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="tabs is-toggle">
                                <ul>
                                    <!-- JS/PHP Add/Remove "is-active" when clicked on / clicked other -->
                                    <li class="is-active">
                                        <a>
                                            <span>Tool-Assisted</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a>
                                            <span>Non Tool-Assisted</span>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <label class="label">Rank</label>
                        <div class="field">
                            <div class="control">
                                <div class="select">
                                    <!-- JS/PHP -->
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
                                    <!-- JS/PHP -->
                                    <select name="map">
                                        <option>Map</option>
                                    </select>
                                </div>
                            </div>
                            <!--Insert List of Monsters here available in the difficulty level selected.-->
                            <div class="control">
                                <div class="select">
                                    <!-- JS/PHP -->
                                    <select name="monster">
                                        <option>Monster</option>	
                                    </select>    
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
                <footer class="modal-card-foot">
                    <!-- JS/PHP add class: is-loading while processing and close it if successful-->
                    <button class="button is-success">Submit Run</button>
                </footer>
            </div>
        </div>
        <!-- Modal Login -->
        <div id="runDivLogin" class="modal">
            <form>
                <div class="modal-background"></div>
                <div class="modal-card">
                    <!-- Login Title -->
                    <header class="modal-card-head">
                        <p class="modal-card-title">Login</p>
                        <button class="delete" aria-label="close" onclick="modalToggleLogin()"></button>
                    </header>
                    <!-- JS/PHP Login Form -->
                    <section class="modal-card-body">
                        <!-- JS/PHP Email Check-->
                        <div class="field">
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
                        <!-- JS/PHP Password Check-->
                        <div class="field">
                            <p class="control has-icons-left">
                                <input class="input" type="password" placeholder="Password">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </p>
                        </div>
                    </section>
                    <footer class="modal-card-foot">
                        <!-- JS/PHP add class: is-loading while processing and close it if successful-->
                        <button class="button is-success">Login</button>
                    </footer>
                </div>
            </form>
        </div>  
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
                                    <!-- JS/PHP Add "is-success" to input if username is avialable | Add "is-danger" if username is not available-->
                                    <input class="input" type="userName" placeholder="i.e example@gmail.com">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
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
                                <input type="submit" value="Submit"  class="button is-dark">
                            </form>
                        </div>
                    </div>
                </form>
                <form class="modal-card-foot">
                    <div class="field">
                        <p class="control">
                            <button class="button is-success" >Register</button>
                        </p>
                    </div>
                </form>
            </div>

        </div>  
    </Body>
</html>