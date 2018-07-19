<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/session.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/db.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/header.php");

// require db queries, do not put query in document
?>
<!-- Main container -->
<section class="hero is-light">
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/components/navigation.php");?>
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
                                        <option>Low</option>
                                        <option>High</option>
                                        <option>Temp</option>
                                    </select>
                                </span>
                            </p>
                            <p class="control">
                                <span class="select">
                                    <select>
                                        <!-- JS/PHP Use JS to grab list of monsters available and add them as options-->
                                        <option>Select Monster</option>
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
                                        <option>WEP</option>
                                    </select>
                                </span>
                            </p>
                            <p class="control">
                                <span class="select">
                                    <select>
                                        <!-- JS/PHP Use JS to grab list of weapons of said type available and add them as options-->
                                        <option>Select Weapon</option>
                                    </select>
                                </span>
                            </p>
                            <p class="control">
                                <!-- Toggles is-dark on click-->
                                <a class="button" id="filterTASToggle" onclick="tasToggle()">
                                    Tool Assisted
                                </a>
                            </p>
                        </div>
                        <!-- JS/PHP Hunter Search -->
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
        <h1 class="has-text-centered has-text-weight-bold" id="currentFilter">
            <!-- JS/PHP Replace this with Monster/Weapon/Hunter ID post filter -->
            Monster: All | Weapon: All | Hunter: All
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
                                        <strong>Top 3 Fastest Hunters</strong>
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
                    <!-- JS/PHP replace the data here according to which tab people clicked above -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Time/Link</th>
                                <th>Date[DD/MM/YY]</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- JS/PHP Replace name with links to weapon/monster to wiki and player to account link -->
                            <tr>
                                <th>1</th>
                                <td><a href="https://mhdata.world/Name1">Name 1</a></td>
                                <td><a href="https://www.youtube.com">00:00</a></td>
                                <td>12/05/18</td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td><a href="https://mhdata.world/Name1">Name 1</a></td>
                                <td><a href="https://www.youtube.com">00:00</a></td>
                                <td>12/05/18</td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td><a href="https://mhdata.world/Name1">Name 1</a></td>
                                <td><a href="https://www.youtube.com">00:00</a></td>
                                <td>12/05/18</td>
                            </tr>
                            <tr>
                                <th>4</th>
                                <td><a href="https://mhdata.world/Name1">Name 1</a></td>
                                <td><a href="https://www.youtube.com">00:00</a></td>
                                <td>12/05/18</td>
                            </tr>
                            <tr>
                                <th>5</th>
                                <td><a href="https://mhdata.world/Name1">Name 1</a></td>
                                <td><a href="https://www.youtube.com">00:00</a></td>
                                <td>12/05/18</td>
                            </tr>
                            <tr>
                                <th>6</th>
                                <td><a href="https://mhdata.world/Name1">Name 1</a></td>
                                <td><a href="https://www.youtube.com">00:00</a></td>
                                <td>12/05/18</td>
                            </tr>
                            <tr>
                                <th>7</th>
                                <td><a href="https://mhdata.world/Name1">Name 1</a></td>
                                <td><a href="https://www.youtube.com">00:00</a></td>
                                <td>12/05/18</td>
                            </tr>
                            <tr>
                                <th>8</th>
                                <td><a href="https://mhdata.world/Name1">Name 1</a></td>
                                <td><a href="https://www.youtube.com">00:00</a></td>
                                <td>12/05/18</td>
                            </tr>
                            <tr>
                                <th>9</th>
                                <td><a href="https://mhdata.world/Name1">Name 1</a></td>
                                <td><a href="https://www.youtube.com">00:00</a></td>
                                <td>12/05/18</td>
                            </tr>
                            <tr>
                                <th>10</th>
                                <td><a href="https://mhdata.world/Name1">Name 1</a></td>
                                <td><a href="https://www.youtube.com">00:00</a></td>
                                <td>12/05/18</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</section>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/components/runs-modal.php");?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/components/login-form.php");?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/components/registration-form.php");?>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php");?>
