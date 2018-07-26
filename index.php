<?php
$page['title'] = '';
$page['meta'] = '';
$page['scripts'] = [
    '/Charts/Chart.js',
];
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/session.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/db.php";
?>
    <script>
        var jsonData = []
        jsonData['diff'] = <?php include $_SERVER['DOCUMENT_ROOT'] . '/sql/monsters-difficulty-list-get.php'?>;
        jsonData['type'] = <?php include $_SERVER['DOCUMENT_ROOT'] . '/sql/weapons-type-list-get.php'?>;
        jsonData['runs_weapons_maps_monsters'] =
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/sql/runs_weapons_maps_monsters-get.php'?>;
        // TODO: ^^translation to charts^^
    </script>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php";
// require db queries, do not put query in document
?>
        <!-- Main container -->
        <section class="hero is-light">
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navigation.php";?>
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
                                            <form action="" method="post">
                                                <select name='states' onchange="fillSelect(this.value, this.form['diff'])">
                                                    <option value="">Difficulty</option>
                                                    <option value="Low">Low</option>
                                                    <option value="High">High</option>
                                                    <option value="Tempered">Tempered</option>
                                                </select>
                                        </span>
                                    </p>
                                    <p class="control">
                                        <span class="select">
                                            <select name='diff'>
                                                <option>Select Monster</option>
                                                <p id="type"></p>
                                            </select>
                                        </span>
                                    </p>
                                    <p class="control">
                                        <!-- Toggles is-dark on click-->
                                        <a class="button" id="filterCapToggle" onclick="capToggle()">
                                            Capture
                                        </a>
                                    </p>
                                    <p class="control">
                                        <a class="button is-dark">Search</a>
                                    </p>
                                </div>
                                <!-- Weapon Selection -->
                                <div class="field-label is-normal">
                                    <label class="label is-unselectable">Weapon</label>
                                </div>
                                <div class="field has-addons">
                                    <p class="control">
                                        <span class="select">
                                            <select name='states' onchange="typeSelect(this.value,this.form['type'])">
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
                                        <div id="select">
                                            <span class="select">
                                                <form action="" method="post">
                                                    <select name='type'>
                                                        <option value="">Select Weapon</option>
                                                    </select>
                                            </span>
                                        </div>
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
                <script>
                    var currentWeaponType = document.querySelect('[name="type"]');
                </script>
                <!-- Main Container: Tiles / Graphs / Tables -->
                <section role="main container">
                    <!-- Summary Card -->
                    <div class="tile is-ancestor">
                        <div class="tile is-parent">
                            <!-- Info Card -->
                            <div class="tile is-2 is-child">
                                <div class="card has-text-centered is-wide">
                                    <div class="card-image">
                                        <canvas id="WeaponRadarChart" width="100" height="100"></canvas>
                                        <script>
                                            let ctx = document.getElementById("WeaponRadarChart")
                                            let WeaponRadarChart = new Chart(ctx, {
                                                type: 'radar',
                                                data: {
                                                    labels: [
                                                        "Great Sword",
                                                        "Sword & Shield",
                                                        "Dual Blades",
                                                        "Long Sword",
                                                        "Hammer",
                                                        "Hunting Horn",
                                                        "Lance",
                                                        "Gunlance",
                                                        "Switch Axe",
                                                        "Charge Blade",
                                                        "Insect Glavie",
                                                        "Bow",
                                                        "Light Bowgun",
                                                        "Heavy Bowgun",
                                                        "Event"
                                                    ],
                                                    datasets: [{
                                                        label: 'Amount of Weapons use',
                                                        data: [
                                                            <?php
$weapon = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='GSD'")->fetchColumn();
echo $weapon?>,
                                                                                                                            <?php
$weapon = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='SAS'")->fetchColumn();
echo $weapon?>,
                                                                                                                            <?php
$weapon = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='DBL'")->fetchColumn();
echo $weapon?>,
                                                                                                                            <?php
$weapon = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='LSD'")->fetchColumn();
echo $weapon?>,
                                                                                                                            <?php
$weapon = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='HAM'")->fetchColumn();
echo $weapon?>,
                                                                                                                            <?php
$weapon = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='HTH'")->fetchColumn();
echo $weapon?>,
                                                                                                                            <?php
$weapon = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='LAN'")->fetchColumn();
echo $weapon?>,
                                                                                                                            <?php
$weapon = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='GUL'")->fetchColumn();
echo $weapon?>,
                                                                                                                            <?php
$weapon = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='AWS'")->fetchColumn();
echo $weapon?>,

                                                                                                                            <?php
$weapon = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='CHB'")->fetchColumn();
echo $weapon?>,
                                                                                                                            <?php
$weapon = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='ING'")->fetchColumn();
echo $weapon?>,
                                                                                                                            <?php
$weapon = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='BOW'")->fetchColumn();
echo $weapon?>,
                                                                                                                            <?php
$weapon = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='LBG'")->fetchColumn();
echo $weapon?>,
                                                                                                                            <?php
$weapon = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='HBG'")->fetchColumn();
echo $weapon?>,
                                                                                                                            <?php
$weapon = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='EVT'")->fetchColumn();
echo $weapon?>,
                                                        ],
                                                        backgroundColor: [
                                                            'rgba(255, 99, 132, 0.2)'
                                                        ],
                                                        borderColor: [
                                                            'rgba(255,99,132,1)',
                                                        ],
                                                        pointBorderColor: [
                                                            <?php
$count = 14;
$array = [];

while ($count-- > 0) {
    array_push($array, "'rgba(255,99,132,1)'");
}
echo implode(",", $array);
?>
                                                        ],
                                                        pointBackgroundColor: [
                                                            <?php
$count = 15;
$array = [];

while ($count-- > 0) {
    array_push($array, "'rgba(255,99,132,1)'");
}

echo implode(",", $array);
?>
                                                        ],

                                                    }]
                                                },
                                                options: {
                                                    layout: {}
                                                }
                                            })
                                        </script>

                                        <figure></figure>
                                    </div>
                                    <div class="card-content">
                                        <div class="media">
                                            <h1>
                                                <strong>Top Hunters</strong>
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
                                                        <td>example user</td>
                                                        <td>
                                                            <a href="/user/example.php">22</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- JS/PHP replace # with a number-->
                                    <footer class="card-footer">
                                        <a hreff="#" class="card-footer-item">Hunters:
                                            <?php
$count = $pdo->query("SELECT count(*) FROM USERS")->fetchColumn();
echo $count // TODO: move to top of page
?>
                                        </a>

                                        <a hreff="#" class="card-footer-item">Runs:
                                            <?php
$count = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS")->fetchColumn();
echo $count
// TODO: move to top of page
?>
                                        </a>
                                    </footer>
                                </div>
                            </div>
                            <!-- Table -->
                            <div class="tile is-4 is-child">
                                <!-- TODO: JS/PHP replace the data here according to which tab people clicked above -->
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
                                        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/table.php";?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Graph -->
                            <div class="tile is-6 is-child">
                                <canvas id="MonsterAverage"></canvas>
                                <script>
                                    var ctx1 = document.getElementById("MonsterAverage");
                                    var MonsterAverage = new Chart(ctx1, {
                                        type: 'horizontalBar',
                                        data: {
                                            labels: ["Anjanath",
                                                "Barroth",
                                                "Diablos",
                                                "Great Girros",
                                                "Great Jagras",
                                                "Jyuratodus",
                                                "Kirin",
                                                "Kulu-Ya-Ku",
                                                "Legiana",
                                                "Odigaron",
                                                "Paolumu",
                                                "Pukei-Pukei",
                                                "Radobaan",
                                                "Rathalos",
                                                "Rathian",
                                                "Tobi-Kadachi",
                                                "Tzitzi-Ya-Ku",
                                                "Zorah Magdaros"
                                            ],
                                            datasets: [{
                                                label: 'Average Run time Per Monster (Low Rank)',
                                                data: [12, 39, 3, 5, 2, 3, 26, 4, 7, 10, 5, 3, 6, 9, 4, 6, 2, 7, 2, 7, 2, 7, 9, 3, 1, 7, 4, 5, 5, 2, 8],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)',
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)',
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)',
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)',
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)',
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)',
                                                    'rgba(255, 99, 132, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgba(255,99,132,1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)',
                                                    'rgba(255,99,132,1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)',
                                                    'rgba(255,99,132,1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)',
                                                    'rgba(255,99,132,1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)',
                                                    'rgba(255,99,132,1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)',
                                                    'rgba(255,99,132,1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)',
                                                    'rgba(255,99,132,1)',
                                                    'rgba(54, 162, 235, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            layout: {}
                                        }
                                    });
                                </script>
                                <figure></figure>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/runs-modal.php";?>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/login-form.php";?>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/registration-form.php";?>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php";?>