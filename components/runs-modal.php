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
                <div class="field">
                    <div class="control">
                        <div class="select">
                            <!-- JS/PHP Fill in with character ids with platform inside <strong> i.e. Metalmine<strong>PC</strong>-->
                            <select name="Character ID">
                                <option>Char ID</option>
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
                                <!-- JS/PHP Add: "is-dark" on click -->
                                <a class="button" id="filterTASToggle" onclick="tasToggle()">
                                    Tool Assisted
                                </a>
                            </p>
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
