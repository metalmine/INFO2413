<!DOCTYPE HTML>
<?php
// connect to the database
include "../inc/dbinfo.inc";

$db = DB_DATABASE;
$sn = DB_SERVER;
$charset = 'utf8mb4';
$dsn = "mysql:host=$sn;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $opt);

?>
<html lang="en">
    <head>
        <!-- Google Tracking -->
        <script src="js/gtag.js"></script>
        <!-- Bulma Set-up -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>MHData</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

        <!-- Javascript Imports -->
        <script src="js/filter.js"></script>
        <script src="js/modal.js"></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="js/navburger.js"></script>
    </head>
    <Body>
        <!-- Main container -->
        <section class="hero is-light">
            <!-- Navigation -->
            <div class="hero-head">
                <nav class="navbar">
                    <!-- Logo and Burger-->
                    <div class="navbar-brand">
                        <figure class="image responsive">
                            <img src="Assets/logo/logo.png">
                        </figure>
                        <!-- Navbar Buttons -->
                        <!-- JS/PHP  Gotta figure out how to do a menu-->
                        <div class="navbar-burger" aria-label="menu" aria-expanded="false">
                            <span id="nav-toggle" class="nav-toggle"></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- Desktop Menu-->
                    <div id="navbarMenuHeroA" class="navbar-menu">
                        <div class="navbar-start">
                            <p class="navbar-item">
                                <a class="button is-dark is-rounded" data-target="modal" aria-haspopup="true" onclick="modalToggleRun()">New Run</a>
                            </p>
                            <!-- Show when Logged out -->
                            <p class="navbar-item">
                                <a class="button is-light is-rounded" onclick="modalToggleLogin()">Login</a>
                            </p>
                            <p class="navbar-item">
                                <a class="button is-light is-rounded" onclick="modalToggleReg()">Register</a>
                            </p>
                            <!-- Show when Logged in -->
                            <p class="navbar-item">
                                <a class="button is-dark is-hidden">Account</a>
                            </p>
                        </div>
                    </div>
                </nav>
            </div>
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
                                        <!-- JS/PHP Add: "is-dark" on click -->
                                        <a class="button" id="filterTASToggle" onclick="tasToggle()">
                                            Tool Assisted
                                        </a>
                                    </p>
                                </div>
                                <!-- Hunter Search -->
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
                    <!-- JS/PHP Replace this with Monster/Weapon/Hunter ID -->
                    Monster: All | Weapon: All | Hunters: All
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
                                                <strong>% Use of Weapons</strong>
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
            <!-- About Us Information -->
            <div class="hero-foot"></div>
        </section>
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
                        <div class="field has-addons">
                            <div class="control">
                                <div class="select">
                                    <!-- JS/PHP -->
                                    <select name="platform">
                                        <option>Platform</option>
                                        <option  value="ps4">PS4</option>
                                        <option  value="xbone">Xbox ONE</option>
                                        <option	 value="pc">PC</option>
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
                        <div class="field is-grouped">
                            <div class="inputBar">
                                <div class="control">
                                    <div class="select">
                                        <!-- JS/PHP -->
                                        <select name="weapon">
                                            <option>Select Weapon</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="tabs is-toggle">
                                <ul>
                                    <!-- JS/PHP Add/Remove "is-active" when clicked on / clicked other -->
                                    <li class="is-active">
                                        <a>
                                            <span>Tool-Assisted</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a>
                                            <span>Non Tool-Assisted</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
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
        <!-- Modal Registration -->
        <div id="runDivReg" class="modal">
            <div class="modal-background"></div>
            <div class="modal-card">
                <!-- Registration Title -->
                <header class="modal-card-head">
                    <p class="modal-card-title">Registration</p>
                    <button class="delete" aria-label="close" onclick="modalToggleReg()"></button>
                </header>
                <!-- JS/PHP Lots of stuff here -->
                <form class="modal-card-body">
                    <div class="field is-horizontal">
                        <div class="form-body">
                            <!-- Username Textfield -->
                            <div class="field">
                                <label class="label">Choose a unique Hunter ID</label>
                                <p class="control has-icons-left has-icons-right">
                                    <!-- JS/PHP Add "is-success" to input if username is avialable | Add "is-danger" if username is not available-->
                                    <input class="input" type="userName" placeholder="i.e Metalmine">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <span class="icon is-small is-right">
                                        <!-- JS/PHP "fa-check" if username is free, "fa-exclamation-triangle" if username is not available-->
                                        <i class="fas fa-check"></i>
                                    </span>
                                </p>
                                <!-- JS/PHP this appears when username is available: <p class="help is-success"> This username is available</p> -->
                                <p class="help is-success"> This username is available</p>
                                <!-- JS/PHP this appears when username is taken: <p class="help is-danger"> This username is available</p>-->
                            </div>
                            <!-- Email Textfield -->
                            <div class="field">
                                <label class="label">Email Address</label>
                                <p class="control has-icons-left has-icons-right">
                                    <!-- JS/PHP Add "is-success" to input if username is avialable | Add "is-danger" if username is not available-->
                                    <input class="input" type="userName" placeholder="i.e example@gmail.com">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <span class="icon is-small is-right">
                                        <!-- JS/PHP "fa-check" if username is free, "fa-exclamation-triangle" if username is not available-->
                                        <i class="fas fa-check"></i>
                                    </span>
                                </p>
                                <!-- JS/PHP this appears when username is available: <p class="help is-success"> This username is available</p> -->
                                <p class="help is-success"> This username is available</p>
                                <!-- JS/PHP this appears when username is taken: <p class="help is-danger"> This username is available</p>-->
                            </div>
                            <!-- Password Textfield -->
                            <div class="field">
                                <label class="label"> Password </label>
                                <p class="control has-icons-left">
                                    <input class="input" type="password">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </p>
                            </div>
                            <!-- Password Confirmation Textfield: Display a check mark if it matches the Password Textfield -->
                            <div class="field">
                                <label class="label"> Confirm Password </label>
                                <p class="control has-icons-left">
                                    <input class="input" type="confirmPassword">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </p>
                            </div>
                            <!-- Platform ID Textfield -->
                            <label class="label"> Select Platform</label>
                            <div class="field has-addons" >
                                <p class="control">
                                    <span class="select">
                                        <select>
                                            <option>PC / Laptop</option>
                                            <option>XBox One</option>
                                            <option>Playstaion 4</option>
                                        </select>
                                    </span>
                                </p>
                                <p class="control">
                                    <input class="input" type="platformIDRegister" placeholder="Platform Name/ID">
                                </p>
                            </div>
                            <form action="?" method="POST">
                                <div class="g-recaptcha" data-sitekey=" 6LcjSmEUAAAAADDdufH1L0nMO8fOdzn0Ca9PhFXv"></div>
                                <input type="submit" value="Submit"  class="button is-dark">
                            </form>
                        </div>
                    </div>
                </form>
                <div class="modal-card-foot">
                <div class="field">
                    <p class="control">
                        <button class="button is-success" >Register</button>
                    </p>
                </div>
            </div>
            </div>
        </div>  
    </Body>
</html>