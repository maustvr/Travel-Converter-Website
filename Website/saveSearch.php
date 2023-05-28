<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

//start the session
session_start();


?>

<html lang="en">

<link rel="stylesheet" type="text/css" href="style.css">
<head>
<title>Login to your Account</title>

</head>
<body>

<form action ="verifyLogin.php" method = "post">
	<h2 id ="smallheadings">Log in to your Account</h2>
	<p id="username">User Name <input type="text" name ="username"/></p>
	<p id="password" >password <input type ="password" name ="password"/></p>
	<p><input type ="submit" class = "savebutton" value="Submit" /></p>
	<a id = "savedsearches" href="createAccount1.php"><b>Click Here to Create a New Account</b></a>
</form>
<?php

			$weatherloc1 = stripslashes($_POST['weatherloc1']);
			$weatherloc2 = stripslashes($_POST['weatherloc2']);
			$timeloc1 = stripslashes($_POST['timeloc1']);
			$timeloc2 = stripslashes($_POST['timeloc2']);
			$currone = stripslashes($_POST['currone']); 
			$currtwo = stripslashes($_POST['currtwo']);
			$curramt = stripslashes($_POST['curramt']);
			$curresult = stripslashes($_POST['curresult']);
			$midistance = stripslashes($_POST['midistance']);
			$kmdistance = stripslashes($_POST['kmdistance']);
			$ftdistance = stripslashes($_POST['ftdistance']);
			$meterdistance = stripslashes($_POST['meterdistance']);
			$lbamt = stripslashes($_POST['lbamt']);
			$kgamt = stripslashes($_POST['kgamt']);
			$name = stripslashes($_POST['searchName']);
			$_SESSION['weatherloc1'] = $weatherloc1;
			$_SESSION['weatherloc2'] = $weatherloc2;
			$_SESSION['timeloc1'] = $timeloc1;
			$_SESSION['timeloc2'] = $timeloc2;
			$_SESSION['currone'] = $currone;
			$_SESSION['currtwo'] = $currtwo;
			$_SESSION['curramt'] = $curramt;
			$_SESSION['curresult'] = $curresult;
			$_SESSION['midistance'] = $midistance;
			$_SESSION['kmdistance'] = $kmdistance;
			$_SESSION['ftdistance'] = $ftdistance;
			$_SESSION['meterdistance'] = $meterdistance;
			$_SESSION['lbamt'] = $lbamt;
			$_SESSION['kgamt'] = $kgamt;
			$_SESSION['name'] = $name;
			
			
?>
</body>

<html>
