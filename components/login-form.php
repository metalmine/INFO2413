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
