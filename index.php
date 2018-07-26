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
    jsonData['monsterName'] = <?php include $_SERVER['DOCUMENT_ROOT'] . '/sql/monsters-difficulty-list-get.php'?>;
    jsonData['weaponName'] = <?php include $_SERVER['DOCUMENT_ROOT'] . '/sql/weapons-type-list-get.php'?>;
    jsonData['runs_weapons_maps_monsters'] = <?php include $_SERVER['DOCUMENT_ROOT'] . '/sql/runs_weapons_maps_monsters-get.php'?>;
    // TODO: ^^translation to charts^^

    // TODO: move to seperate file
    function fillSelect(nValue, nList) {
		nList.options.length = 1
		let curr = jsonData['monsterName'][nValue]

		for (let key in curr) {
            if (curr.hasOwnProperty(key)) {
                let nOption = document.createElement('option')
                nOption.appendChild(document.createTextNode(curr[key].name))
                nOption.setAttribute("value", curr[key].name)
                nList.appendChild(nOption)
			}
        }
	}

    // TODO: move to seperate file
    function typeSelect(nValue, nList) {
        nList.options.length = 1
        let curr = jsonData['weaponName'][nValue]

        for (let key in curr) {
            if (curr.hasOwnProperty(key)) {
                let nOption = document.createElement('option')
                nOption.appendChild(document.createTextNode(curr[key].weaponName))
                nOption.setAttribute("value", curr[key].weaponName)
                nList.appendChild(nOption)
            }
        }
    }

    // TODO: move to seperate file
    let ctx = document.getElementById("myChart")
    let myChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: [
                "Great Sword",
                "Sword & Shield",
                "Dual Blades",
                "Long Sword" ,
                "Hammer",
                "Hunting Horn",
                "Lance",
                "Gunlance",
                "Switch Axe",
                "Charge Blade" ,
                "Insect Glavie" ,
                "Bow" ,
                "Light Bowgun" ,
                "Heavy Bowgun",
                "Event"
            ],
            datasets: [{
                label: 'Amount of Weapons use',
                data: [
                    // TODO: Data here -> waiting on data from jsonData['runs_weapons_maps_monsters']
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
            layout: {
            }
        }
    })
</script>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.php";
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
                                    <select name='monsterRank' onchange="fillSelect(this.value, this.form['monsterName'])">
            							<option value="">Difficulty</option>
            							<option value="Low">Low</option>
            							<option value="High">High</option>
            							<option value="Tempered">Tempered</option>
                                    </select>
                                </span>
                            </p>
                            <p class="control">
                                <span class="select">
                                    <select name='monsterName'>
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
                            <label class="label is-unselectable">Optional Filters:</label>
                        </div>
                        <div class="field has-addons">
                            <p class="control">
                                <span class="select">
                                    <select name='weaponType' onchange="typeSelect(this.value,this.form['weaponName'])">
                                        <option value="">Weapon Type</option>
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
                                <a class="button" id="filterTASToggle" onclick="tasToggle()">
                                    Tool Assisted
                                </a>
                            </p>
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
        <!-- Main Container: Tiles / Graphs / Tables -->
        <section role="main container">
            <!-- Summary Card -->
            <div class="tile is-ancestor">
                <div class="tile is-parent is-vertical">
                    <div class="tile is-child">
                        <div class="card has-text-centered is-wide">
                            <div class="card-image">
                                <canvas id="myChart" width="100" height="100"></canvas>
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
                                                <td><a href="/user/example.php">22</a></td>
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
                                echo $count// TODO: move to top of page
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
                </div>
                <!-- Insert more tables here -->
                <div class="tile is-6 is-parent">
                    <div class="tile is-child">
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
				<?php 
$stmt = $pdo->query('SELECT DISTINCT RUNS.runId, USERS.userId, username, time, submitedAt FROM USERS JOIN USERS_RUNS ON USERS.userId = USERS_RUNS.userId JOIN RUNS ON RUNS.runId = USERS_RUNS.runId ORDER BY runId DESC LIMIT 10');
foreach ($stmt as $row)
{
    echo "<tr> <th> " . $row['runId'] . "</th> <td>", $row['username'] . "</td> <td>", $row['time'] . "</td> <td>", $row['submitedAt'] . "</td> </tr>";
}?> 

                            </tbody>
                        </table>
                    </div>
                </div>
                    <!-- JS/PHP JESSICA Insert Graph Here -->
                <div class="tile is-4">
                </div>
            </div>
        </section>
    </div>
</section>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/runs-modal.php";?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/login-form.php";?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/registration-form.php";?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php";?>
