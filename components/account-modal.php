<!-- Hunter Account -->
<div id="runDivAcc" class="modal">
    <form name="account">
        <div class="modal-background"></div>
        <div class="modal-card">
            <!-- Account Details Head-->
            <header class="modal-card-head">
                <p class="modal-card-title">Account Details</p>
                <button class="delete" aria-label="close" onclick="modalToggleAcc()"></button>
            </header>
            <!-- Account Detail -->
            <section class="modal-card-body">
                <div class="tile is-ancestor">
                    <!--Account Detail Tiles-->
                    <div class="tile is-parent is-vertical">
                        <!--Active character selection-->
                        <div class="tile is-child">

                            <label class="label">Active Character:</label>
                            <div class="field has-addons">
                                <div class="control">
                                    <div class="select">
                                        <!-- TODO: List Characters here-->
                                    </div>
                                </div>
                                <div class="control">
                                    <button type="submit" class="button is-danger">Set as Active</button>
                                </div>
                            </div>
                        </div>
                        <!--Password Change-->
                        <div class="tile is-child">
                            <label class="label">Edit Password</label>
                            <div class="field">
                                <label class="label">Current Password:</label>
                                <p class="control">
                                    <input class="input" type="text" placeholder="********">
                                </p>
                                </p>
                            </div>
                            <div class="field">
                                <label class="label">New Password:</label>
                                <p class="control">
                                    <input class="input" type="text" placeholder="********">
                                </p>
                                </p>
                            </div>
                            <div class="field">
                                <label class="label">Confirm Password:</label>
                                <p class="control">
                                    <input class="input" type="text" placeholder="********">
                                </p>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--10 most recent runs by hunter-->
                    <div class="tile is-parent">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Approved</th>
                                    <th>Monster</th>
                                    <th>Time/Link</th>
                                    <th>Date[DD/MM/YY]</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--TODO: Insert PHP-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
                <!-- JS/PHP add class: is-loading while processing and close it if successful-->
                <button class="button is-success">Save</button>
                <button class="button is-danger is-outlined">Cancel</button>
            </footer>
        </div>
    </form>
</div>