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
                                    <select name='states' onchange="fillSelect(this.value,this.form['diff'])">
							<option value="">Difficulty</option>
							<option value="Low">Low</option>
							<option value="High">High</option>
							<option value="Tempered">Tempered</option>
                                    </select>
                                </span>
                            </p>
                            <p class="control">
                                <span class="select">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript">
	
	var diff = []; 
	diff["Low"] = [ 
	<?php
	$stmt = $pdo->query("SELECT name FROM MONSTERS WHERE difficulty='low'");
	foreach ($stmt as $row)
	{ ?>
	"<?php echo $row['name']; ?>",
	<?php
	}
	?>

];
	diff["High"] = [
	<?php
	$stmt = $pdo->query("SELECT name FROM MONSTERS WHERE difficulty='High'");
	foreach ($stmt as $row)
	{ ?>
	"<?php echo $row['name']; ?>",
	<?php
	}
	?>
];
	diff["Tempered"] = [
	<?php
	$stmt = $pdo->query("SELECT name FROM MONSTERS WHERE difficulty='Tempered'");
	foreach ($stmt as $row)
	{ ?>
	"<?php echo $row['name']; ?>",
	<?php
	}
	?>

];


	function fillSelect(nValue,nList){

		nList.options.length = 1;
		var curr = diff[nValue];
		for (each in curr)
			{
			 var nOption = document.createElement('option'); 
			 nOption.appendChild(document.createTextNode(curr[each])); 
			 nOption.setAttribute("value",curr[each]); 			 
			 nList.appendChild(nOption); 
			}
	}

var type = []; 
type["GSD"] = [
	<?php
	$stmt = $pdo->query("SELECT weaponName FROM WEAPONS WHERE type='GSD'");
	foreach ($stmt as $row)
	{ ?>
	"<?php echo $row['weaponName']; ?>",
	<?php
	}
	?>
];

type["LSD"] = [
	<?php
	$stmt = $pdo->query("SELECT weaponName FROM WEAPONS WHERE type='LSD'");
	foreach ($stmt as $row)
	{ ?>
	"<?php echo $row['weaponName']; ?>",
	<?php
	}
	?>
];
type["HTH"] = [
	<?php
	$stmt = $pdo->query("SELECT weaponName FROM WEAPONS WHERE type='HTH'");
	foreach ($stmt as $row)
	{ ?>
	"<?php echo $row['weaponName']; ?>",
	<?php
	}
	?>
];
type["DBL"] = [
	<?php
	$stmt = $pdo->query("SELECT weaponName FROM WEAPONS WHERE type='DBL'");
	foreach ($stmt as $row)
	{ ?>
	"<?php echo $row['weaponName']; ?>",
	<?php
	}
	?>
];
type["SAS"] = [
	<?php
	$stmt = $pdo->query("SELECT weaponName FROM WEAPONS WHERE type='SAS'");
	foreach ($stmt as $row)
	{ ?>
	"<?php echo $row['weaponName']; ?>",
	<?php
	}
	?>
];
type["LAN"] = [
	<?php
	$stmt = $pdo->query("SELECT weaponName FROM WEAPONS WHERE type='LAN'");
	foreach ($stmt as $row)
	{ ?>
	"<?php echo $row['weaponName']; ?>",
	<?php
	}
	?>
];
type["GUL"] = [
	<?php
	$stmt = $pdo->query("SELECT weaponName FROM WEAPONS WHERE type='GUL'");
	foreach ($stmt as $row)
	{ ?>
	"<?php echo $row['weaponName']; ?>",
	<?php
	}
	?>
];
type["AWS"] = [
	<?php
	$stmt = $pdo->query("SELECT weaponName FROM WEAPONS WHERE type='AWS'");
	foreach ($stmt as $row)
	{ ?>
	"<?php echo $row['weaponName']; ?>",
	<?php
	}
	?>
];
type["CHB"] = [
	<?php
	$stmt = $pdo->query("SELECT weaponName FROM WEAPONS WHERE type='CHB'");
	foreach ($stmt as $row)
	{ ?>
	"<?php echo $row['weaponName']; ?>",
	<?php
	}
	?>
];
type["ING"] = [
	<?php
	$stmt = $pdo->query("SELECT weaponName FROM WEAPONS WHERE type='ING'");
	foreach ($stmt as $row)
	{ ?>
	"<?php echo $row['weaponName']; ?>",
	<?php
	}
	?>
];
type["BOW"] = [
	<?php
	$stmt = $pdo->query("SELECT weaponName FROM WEAPONS WHERE type='BOW'");
	foreach ($stmt as $row)
	{ ?>
	"<?php echo $row['weaponName']; ?>",
	<?php
	}
	?>
];
type["LBG"] = [
	<?php
	$stmt = $pdo->query("SELECT weaponName FROM WEAPONS WHERE type='LBG'");
	foreach ($stmt as $row)
	{ ?>
	"<?php echo $row['weaponName']; ?>",
	<?php
	}
	?>
];
type["HBG"] = [
	<?php
	$stmt = $pdo->query("SELECT weaponName FROM WEAPONS WHERE type='HBG'");
	foreach ($stmt as $row)
	{ ?>
	"<?php echo $row['weaponName']; ?>",
	<?php
	}
	?>
];
type["EVT"] = [
	<?php
	$stmt = $pdo->query("SELECT weaponName FROM WEAPONS WHERE type='EVT'");
	foreach ($stmt as $row)
	{ ?>
	"<?php echo $row['weaponName']; ?>",
	<?php
	}
	?>

];



	function typeSelect(nValue,nList){

		nList.options.length = 1;
		var curr = type[nValue];
		for (each in curr)
			{
			 var nOption = document.createElement('option'); 
			 nOption.appendChild(document.createTextNode(curr[each])); 
			 nOption.setAttribute("value",curr[each]); 			 
			 nList.appendChild(nOption); 
			}
	}
</script>



                                    <select name='diff'>
						<option> Select Monster</option>
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
                                <span class="select">
                                    <select name='type'>
					<option value="">Select Weapon</option>  
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

                               <meta name="viewport" content="width=device-width, initial-scale=1">

                                        <script src="Chart.js"></script>
                                        <canvas id="myChart" width="100" height="100"></canvas>

                                                                                 <script src="Chart.js"></script>
                                        <canvas id="myChart" width="100" height="100"></canvas>

                                        <script>
                                            var ctx = document.getElementById("myChart");
                                            var myChart = new Chart(ctx, {
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
							"Event"],
                                                    datasets: [{
                                                        label: 'Amount of Weapons use',
                                                        data: [

                                                            
<?php
$count = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='GSD'")->fetchColumn();
echo $count
?>
, 
<?php
$count = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='SAS'")->fetchColumn();
echo $count
?>
,
<?php
$count = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='DBL'")->fetchColumn();
echo $count
?>
,
<?php
$count = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='LSD'")->fetchColumn();
echo $count
?> 
, 
<?php
$count = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='HAM'")->fetchColumn();
echo $count
?>
, 
<?php
$count = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='HTH'")->fetchColumn();
echo $count
?>
,
<?php
$count = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='LAN'")->fetchColumn();
echo $count
?>
,
<?php
$count = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='GUL'")->fetchColumn();
echo $count
?>
,
<?php
$count = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='AWS'")->fetchColumn();
echo $count
?>
,
<?php
$count = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='CHB'")->fetchColumn();
echo $count
?>
, 
<?php
$count = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='ING'")->fetchColumn();
echo $count
?>
, 
<?php
$count = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='BOW'")->fetchColumn();
echo $count
?>
,
<?php
$count = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='LBG'")->fetchColumn();
echo $count
?>
, 
<?php
$count = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='HBG'")->fetchColumn();
echo $count
?>
,
<?php
$count = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS WHERE type='EVT'")->fetchColumn();
echo $count
?>
],
                                                        backgroundColor: [
                                                            'rgba(255, 99, 132, 0.2)'
                                                        ],
                                                        borderColor: [
                                                            'rgba(255,99,132,1)',
                                                        ],
                                                        pointBorderColor: [
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
							    'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)'
                                                        ],
                                                        pointBackgroundColor: [
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
							    'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)',
                                                            'rgba(255,99,132,1)'
                                                        ],

                                                    }]
                                                },
                                                options: {
                                                    layout: {
                                                    }
                                                }	
                                            });
                                        </script>


                                <figure>
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
                                 <a hreff="#" class="card-footer-item">Hunters:
				<?php
				$count = $pdo->query("SELECT count(*) FROM USERS")->fetchColumn();
				echo $count
				?>
				</a>

                                <a hreff="#" class="card-footer-item">Runs: 
				<?php
				$count = $pdo->query("SELECT count(*) FROM RUNS_WEAPONS_MAPS_MONSTERS")->fetchColumn();
				echo $count
				?>
				</a>
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