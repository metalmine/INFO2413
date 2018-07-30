<!-- Modal Runs -->
<div id="runDivRun" class="modal">
<form id="runSubmit" action="../includes/submit.php" name="runSubmit" method="post">
    <div class="modal-background"></div>
    <div class="modal-card">
        <!-- Run Submission Title-->
        <header class="modal-card-head">
            <p class="modal-card-title">Submit New Run</p>
            <button class="delete" aria-label="close" onclick="modalToggleRun()" type="reset"></button>
        </header>
        <!-- Run Submission Form -->
        <section class="modal-card-body">
                <label class="label"> Character Name:
                    <?PHP if (isset($_SESSION['platformId'])) {echo $_SESSION['platformId'];}?>
                </label>
                <label class="label">Weapon</label>
                <div class="field has-addons">
                    <p class="control">
                        <span class="select">
                            <select name='weaponType' onchange="typeSelect(this.value,this.form['weaponName'])">
                                <option value="">Select Type</option>
                                <option value="GSD">Great Sword</option>
                                <option value="LSD">Long Sword</option>
                                <option value="HAM">Hammer</option>
                                <option value="HTH">Hunting Horn</option>
                                <option value="DBL">Dual Blades</option>
                                <option value="SAS">Sword and Sheild</option>
                                <option value="LAN">Lance</option>
                                <option value="GUL">Gun Lance</option>
                                <option value="AWS">Switch Axe</option>
                                <option value="CHB">Charge Blade</option>
                                <option value="ING">Insect Glaive</option>
                                <option value="BOW">Bow</option>
                                <option value="LBG">Light Bowgun</option>
                                <option value="HBG">Heavy Bowgun</option>
                                <option value="EVT">Event Weapons</option>
                            </select>
                        </span>
                    </p>
                    <p class="control">
                        <span class="select">
                            <select name='weaponName'>
                                <option value="">Select Weapon</option>
                            </select>
                        </span>
                    </p>
                    <p class="control">
                        <!-- Toggles is-dark on click-->
                        <a class="button" id="runTASToggle" onclick="tasToggleRun()">
                            Tool Assisted
                        </a>
                    </p>
                </div>
                <span id='runSubmit_weaponType_errorloc' class="help is-danger"></span>
                <span id='runSubmit_weaponName_errorloc' class="help is-danger"></span>
                <label class="label">Monster</label>
                <div class="field has-addons">
                    <p class="control">
                        <span class="select">
                            <select name="monsterRank" id="select-difficulty" onchange="fillSelect(this.value, this.form['monsterName'])">
                                <option value="">Difficulty</option>
                                <option value="Low">Low</option>
                                <option value="High">High</option>
                                <option value="Tempered">Tempered</option>
                            </select>
                        </span>
                    </p>
                    <p class="control">
                        <span class="select">
                            <select name='monsterName' id="select-monster">
                                <option value="">Select Monster</option>
                            </select>
                        </span>
                    </p>
                </div>
                <span id='runSubmit_monsterRank_errorloc' class="help is-danger"></span>
                <span id='runSubmit_monsterName_errorloc' class="help is-danger"></span>
                <label class="label">Video</label>
                <div class="field has-addons">
                    <div class="control">
                        <div class="select">
                            <!-- JS/PHP -->
                            <select name="Country">
                                <option>Country Name</option>
                            </select>
                        </div>
                    </div>
                    <div class="control">
                        <input class="input" type="text" name="youtube" placeholder="Youtube Link">
                    </div>
                    <div class="control">
                        <input class="input" type="text" name="time" placeholder="Run Time: 'MM:SS'">
                    </div>
                </div>
                <span id='runSubmit_youtube_errorloc' class="help is-danger"></span>
                <span id='runSubmit_time_errorloc' class="help is-danger"></span>
        </section>
        <footer class="modal-card-foot">
            <!-- JS/PHP add class: is-loading while processing and close it if successful-->
            <button class="button is-success" type="submit"  value="Submit">Submit Run</button>
            <button class="button is-success" type="reset" onclick="modalToggleRun()">Cancel</button>
        </footer>
    </div>
    </form>
    <script type="text/javascript">
        var frmvalidator  = new Validator("runSubmit");
        frmvalidator.EnableOnPageErrorDisplay();
        frmvalidator.EnableMsgsTogether();
        frmvalidator.addValidation("weaponType","req","Please provide your Weapon Type");
        frmvalidator.addValidation("weaponName","req","Please provide your Weapon Name");
        frmvalidator.addValidation("monsterRank","req","Please provide your Monster Rank");
        frmvalidator.addValidation("monsterName","req","Please provide your Monster Name");
        frmvalidator.addValidation("youtube","req","Please provide your Youtube Link");
        frmvalidator.addValidation("time","req","Please provide your Completion Time");
    </script>
</div>
