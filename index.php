<?php
$page['title'] = "MHData";
$page['meta'] = "";
$page['scripts'] = [
    "/Charts/Chart.js",
    "/js/select.js",
    "/js/chart-index.js"
];
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/session.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/db.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/header.php");
// require_once('/includes/load.php');
?>
<script>
jsonData['diff'] = <?php include($_SERVER['DOCUMENT_ROOT'] . '/sql/monsters-difficulty-list-get.php') ?>;
jsonData['type'] = <?php include($_SERVER['DOCUMENT_ROOT'] . '/sql/weapons-type-list-get.php') ?>;
jsonData['runs_weapons_maps_monsters'] = <?php include($_SERVER['DOCUMENT_ROOT'] . '/sql/runs_weapons_maps_monsters-get.php') ?>;
// TODO: ^^translation to charts^^
</script>
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
                        <?php include "./components/monster-selection.php"; ?>

                        <!-- Weapon Selection -->
                        <?php include "./components/weapon-selection.php"; ?>

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
                                <canvas id="myChart" width="100" height="100"></canvas>
                                <figure></figure>
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

                            <!--
                                JS/PHP replace # with a number
                                TODO: split sql
                            -->
                            <div class="card-footer">
                                <a hreff="#" class="card-footer-item">Hunters:
                				<?php
                				$count = $pdo->query("SELECT count(*) FROM USERS")->fetchColumn();
                				echo $count
                                // TODO: move to top of page
                				?>
                				</a>

                                <a hreff="#" class="card-footer-item">Runs:
                				<?php
                				$count = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS")->fetchColumn();
                				echo $count
                                // TODO: move to top of page
                				?>
                				</a>
                            </div>
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
                            <?php
                            for ($i = 1; $i <= 10; $i++)
                                echo "<tr>
                                    <th>{$i}</th>
                                    <td><a href=\"https://mhdata.world/Name1\">Name 1</a></td>
                                    <td><a href=\"https://www.youtube.com\">00:00</a></td>
                                    <td>12/05/18</td>
                                </tr>";
                            ?>
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
