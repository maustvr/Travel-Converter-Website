<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

//start the session
session_start();

?>

<html lang="en">

<link rel="stylesheet" type="text/css" href="style.css">
<script src ="script.js"></script>
<head>

<style>
</style>

</head>
<p>
<body>

<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
	
	
			
	$DBConnect= mysqli_connect(" ", " ", " ", " ");
	
	if($DBConnect === false)
		print"Unable to connect to the database, error, number:".mysqli_errno();

		else{
					
			$usersTable = "users";
			$savedTable = "savedsearches";
			$username = stripslashes($_POST['username']);
			$password = stripslashes($_POST['password']);
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$weatherloc1 = $_SESSION['weatherloc1'];
			$weatherloc2 = $_SESSION['weatherloc2'];
			$timeloc1 = $_SESSION['timeloc1'];
			$timeloc2 = $_SESSION['timeloc1'];
			$currone = $_SESSION['currone'];
			$currtwo = $_SESSION['currtwo'];
			$curramt = $_SESSION['curramt'];
			$curresult = $_SESSION['curresult'];
			$midistance = $_SESSION['midistance'];
			$kmdistance = $_SESSION['kmdistance'];
			$ftdistance = $_SESSION['ftdistance'];
			$meterdistance = $_SESSION['meterdistance'];
			$lbamt = $_SESSION['lbamt'];
			$kgamt = $_SESSION['kgamt'];
			$name = $_SESSION['name'];		
			$SQLString = "select * from $usersTable where username = '$username'";			
			
			$QueryResult = mysqli_query($DBConnect, $SQLString);
			$ResultId = mysqli_fetch_assoc($QueryResult);
			if(mysqli_num_rows($QueryResult) == 0){
					header("Location: incorrectLogin.php");
					exit;					
				}else 
					$PW = $ResultId['password'];
					$username = $ResultId['username'];
					if (password_verify($password, $PW)) {							
							$ID = $ResultId['ID'];
							$_SESSION['logged_in'] = true;
							header("Location: projecthandler.php");
							exit;							
							}else 
						print"incorrect user name or password";
						header("Location: incorrectLogin.php");
						exit;						
						}
						
					mysqli_free_result($QueryResult);
									
		mysqli_close($DBConnect);

?>