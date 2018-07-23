<!-- Navigation -->
<div class="hero-head">
    <nav class="navbar">
        <!-- Logo and Burger-->
        <div class="navbar-brand">
            <figure class="image responsive">
                <img src="Assets/logo/logo.png">
            </figure>
            <!-- Navbar Buttons -->
            <!-- JS/PHP  Gotta figure out how to do a menu-->
            <div class="navbar-burger" aria-label="menu" aria-expanded="false">
                <span id="nav-toggle" class="nav-toggle"></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- Desktop Menu-->
        <div id="navbarMenuHeroA" class="navbar-menu">
            <div class="navbar-start">
                <!-- Show when Logged out -->
                <?php if (empty($_SESSION['email'])): ?>
                <p class="navbar-item">
                    <a class="button is-light is-rounded" onclick="modalToggleLogin()">Login</a>
                </p>
                <p class="navbar-item">
                    <a class="button is-light is-rounded" onclick="modalToggleReg()">Register</a>
                </p>
                <?php else: ?>
                <!-- Show when Logged in -->
                <p class="navbar-item">
                    <a class="button is-dark is-rounded" data-target="modal" aria-haspopup="true" onclick="modalToggleRun()">New Run</a>
                </p>
                <p class="navbar-item">
                    <a class="button is-dark is-rounded">Account</a>
                </p>
                <p class="navbar-item">
                    <a class="button is-danger is-rounded" href='../includes/logout.php'>Logout</a>
                </p>
                <?php endif;?>
            </div>
        </div>
    </nav>
</div>
