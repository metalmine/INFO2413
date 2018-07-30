<!-- Hunter Account -->
<div id="runDivAcc" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <!-- Account Details Head-->
            <header class="modal-card-head">
                <p class="modal-card-title">Account Details</p>
                <button class="delete" aria-label="close" onclick="modalToggleAcc()" type="reset"></button>
            </header>
            <!-- Account Detail -->
            <section class="modal-card-body">
                <div class="tile is-ancestor">
                    <!--Account Detail Tiles-->
                    <div class="tile is-parent is-vertical">
                        <!--Active character selection-->
                        <div class="tile is-6 is-child">
                            <label class="label">Active Character:</label>
                            <div class="field has-addons">
                                <div class="control">
                                    <div class="select">
                                      <?php
                                      //$platId  = $pdo->query("SELECT * FROM PLATFORMS WHERE userId = '" . $_SESSION['Username'] . "'");
                                      //$rowId = $platId->fetch(PDO::FETCH_ASSOC);
                                      $query = $pdo->query("SELECT *
                                                            FROM PLATFORMS
                                                            inner JOIN USERS_PLATFORMS ON PLATFORMS.platId = USERS_PLATFORMS.platId
                                                            WHERE USERS_PLATFORMS.userId = '" . $_SESSION['userId'] . "'");
                                      while ($row = $query->fetch(PDO::FETCH_ASSOC)){
                                       echo '<option value="'.$row['platId'].'">'.$row['platformId'].'</option>';
                                      }
                                      ?>
                                    </div>
                                </div>
                            </div>
                            <div class="control">
                                <button type="submit" class="button is-danger">Set as Active</button>
                            </div>
                        </div>
                        <!--Password Change-->
                      <form id="account" name="account" action="../includes/reset.php" method="post">
                        <div class="tile is-child">
                            <label class="label">Edit Password</label>
                            <div class="field">
                                <label class="label">Current Password:</label>
                                <p class="control">
                                    <input class="input" type="password" name="oldPassword" placeholder="********">
                                    <span id='runSubmit_oldPassword_errorloc' class="help is-danger"></span>
                                </p>
                            </div>
                            <div class="field">
                                <label class="label">New Password:</label>
                                <p class="control">
                                    <input class="input" type="password" name="newPassword" placeholder="********">
                                    <span id='runSubmit_newPassword_errorloc' class="help is-danger"></span>
                                </p>
                            </div>
                            <div class="field">
                                <label class="label">Confirm Password:</label>
                                <p class="control">
                                    <input class="input" type="password" name="confirmPassword" placeholder="********">
                                    <span id='runSubmit_confirmPassword_errorloc' class="help is-danger"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--10 most recent runs by hunter-->
                    <div class="tile is-6 is-parent">
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
                              <?php
                                $stmt = $pdo->query("SELECT DISTINCT RUNS.runId, status, MONSTERS.name, weaponName, time, submitedAt
                                                      FROM USERS_RUNS
                                                      inner JOIN RUNS ON USERS_RUNS.runId = RUNS.runId
                                                      inner JOIN APPROVALS ON APPROVALS.runId = RUNS.runId
                                                      inner JOIN RUNS_WEAPONS_MAPS_MONSTERS ON RUNS_WEAPONS_MAPS_MONSTERS.runId = USERS_RUNS.runId
                                                      inner JOIN MONSTERS ON MONSTERS.monsterId = RUNS_WEAPONS_MAPS_MONSTERS.monsterId
                                                      inner JOIN WEAPONS ON WEAPONS.weaponId = RUNS_WEAPONS_MAPS_MONSTERS.weaponId AND WEAPONS.type = RUNS_WEAPONS_MAPS_MONSTERS.type AND WEAPONS.tree = RUNS_WEAPONS_MAPS_MONSTERS.tree
                                                      WHERE USERS_RUNS.userId = '" . $_SESSION['userId'] . "'");

                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                  echo "<tr> <th> " . $row['runId'] . "</th> <td>", $row['status'] . "</td> <td>", $row['name'] . "</td> <td>",  $row['time'] . "</td> <td>", $row['submitedAt'] . "</td> </tr>";
                              }
                              ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <footer class="modal-card-foot">
                <!-- JS/PHP add class: is-loading while processing and close it if successful-->
                <button class="button is-success">Save</button>
                <button class="button is-danger is-outlined" type="reset" onclick="modalToggleAcc()">Cancel</button>
            </footer>
        </div>
      </form>
      <script type="text/javascript">
          var frmvalidator  = new Validator("account");
          frmvalidator.EnableOnPageErrorDisplay();
          frmvalidator.EnableMsgsTogether();
          frmvalidator.addValidation("oldPassword","req","Please provide a current password");
          frmvalidator.addValidation("newPassword","req","Please provide a new password");
          frmvalidator.addValidation("confirmPassword","eqelmnt=newPassword","The confirmed password is not same as new password");
      </script>
</div>
