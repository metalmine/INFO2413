<!DOCTYPE HTML>
<html lang="en">
<head>
<TITLE> MHW Run Agregator</TITLE>
<meta charset="utf-8">
</head>
<Body>

<?php
$name = "name";
$GameerTag = "Gametag"; 

//connection to the database
$dbhandle = mysql_connect($name, $Gamertage)
  or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysql_select_db("mhwData",$dbhandle)
  or die("Could not select mhwdata");

//execute the SQL query and return records
$result = mysql_query("SELECT userId, username,password, email, accountType, gamerTag FROM user");

//fetch tha data from the database
while ($row = mysql_fetch_array($result)) {
   echo "ID:".$row{'userid'}."Name:".$row{'uername'}."Password: ". //display the results
   $row{'password'}."email:".$row{'email'}."accountType:".$row{'accountType'}."gamerTag:".$row{'gamerTag'}."<br>";
}
//close the connection
mysql_close($dbhandle);
?>

	
	
	
<div align="Right">
	<a href="url">Login</a><br>
	<a href="url">Register</a><br>
</div>

<center>
Character Name:<br>
<input type="text" name="name"><br>
GamerTag:<br>
<input type="text" name="gamerTag"><br>
Platform:<br>
<form>
	<select name="platform">
		<option  value="ps4">PS4</option>
		<option  value="xbone">Xbox ONE</option>
		<option	 value="pc">PC</option>
		
	</select>
</form>
Weapon:<br>
<form>
	<select name="weapon">
		<option id="w01" value="longSword">Long Sword</option>
		<option id="w02" value="greatSword">Great Sword</option>
		<option id="w03" value="dualSword">Dual Blades</option>
		<option id="w04" value="swordAndSheild">Sword and Sheild</option>
		<option id="w05" value="switchAxe">Switch Axe</option>
		<option id="w06" value="chargeBlade">Charge Blade</option>
		<option id="w07" value="hammer">Hammer</option>
		<option id="w08" value="huntingHorn">Hunting Horn</option>
		<option id="w09" value="lance">Lance</option>
		<option id="w10" value="gunLance">Gunlance</option>
		<option id="w11" value="insectGlaive">Insect Glaive</option>
		<option id="w12" value="bow">Bow</option>
		<option id="w13" value="lightBowgun">Light Bowgun</option>
		<option id="w14" value="heavyBowgun">Heavy Bowgun</option>
	</select>
</form>
Rank:<br>
<form>
  <input id="l" type="radio" name="rank" value="low" checked> Low<br>
  <input id="h" type="radio" name="rank" value="high"> High<br>
  <input id="t" type="radio" name="rank" value="tempered"> Tempered<br>
</form>

Monster:<br>
<form>
	<select name="monster">
		<option id="m01" value="anjanath">Anajanath</option>
		<option id="m02H" value="azureRathlos">Azure Rathlos</option>
		<option id="m02" value="barroth">Barroth</option>
		<option id="m03" value="bazelgeuse">Bazelgeuse</option>
		<option id="m04" value="blackDiablos">Black Diablos</option>
		<option id="m05" value="diablos">Diablos</option>
		<option id="m06" value="dodogama">Dodogama</option>
		<option id="m07" value="greatGirros">Great Girros</option>
		<option id="m08" value="greatJagras">Great Jagras</option>
		<option id="m09" value="jyuratodus">Jyuratodus</option>
		<option id="m10" value="kirin">Kirin</option>
		<option id="m11" value="kuluYaKu">Kulu-Ya-Ku</option>
		<option id="m12" value="kushalaDaora">Kushala Daora</option>
		<option id="m13" value="lavasioth">Lavasioth</option>
		<option id="m14" value="legiana">Legiana</option>
		<option id="m15" value="nergigante">Nergigante</option>
		<option id="m16" value="odogaron">Odogaron</option>
		<option id="m17" value="paolumu">Paolumu</option>
		<option id="m18" value="pinkRathian">Pink Rathian</option>
		<option id="m19" value="pukeiPukei">Pukei-Pukei</option>
		<option id="m20" value="radobaan">Radobaan</option>
		<option id="m21" value="Rathalos">Rathalos</option>
		<option id="m22" value="rathian">Rathian</option>
		<option id="m23" value="teostra">Teostra</option>
		<option id="m24" value="tobiKadachi">Tobi-Kadachi</option>
		<option id="m25" value="tzitziYaKu">Tzitzi-Ya-Ku</option>
		<option id="m26" value="vaalHazak">Vaal Hazak</option>
		<option id="m27" value="xenoJiiva">Xeno'jiiva</option>
		<option id="m28" value="zorahMagdaros">Zorah Magdaros</option>
		
	
	</select>
</form>
<!--Anjanath Azure Rathalos  Barroth  Bazelgeuse  Black Diablos  Diablos  Dodogama  Great Girros  Great Jagras  Jyuratodus Kirin Kulu-Ya-Ku Kushala Daora Lavasioth Legiana Nergigante  Odogaron Paolumu Pink Rathian Pukei-Pukei Radobaan Rathalos  Rathian  Teostra  Tobi-Kadachi Tzitzi-Ya-Ku Uragaan  Vaal Hazak  Xeno'jiiva  Zorah Magdaros-->
Map:
<form>
	<select name="map">
		<option id="map01L" value="ancientForest">Ancient Forest</option>
	</select>
</form>
<br>
Time:<br>
<input type="text" name="time"><br>
<br>
<input type="button" value="Submit">

</body>
</html>
