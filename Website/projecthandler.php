


<html lang="en">
<head>

<style>

</style>
<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

//start the session
session_start();

?>
</head>
<p>
<body>
<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
	
	
			
	$DBConnect= mysqli_connect("", " ", " ", " ");
	
	if($DBConnect === false)
		print"Unable to connect to the database, error, number:".mysqli_errno();

		else{
			
			$usersTable = "users";
			$savedTable = "savedsearches";
			$weatherloc1 = $_SESSION['weatherloc1'];
			$weatherloc2 = $_SESSION['weatherloc2'];
			$timeloc1 = $_SESSION['timeloc1'];
			$timeloc2 = $_SESSION['timeloc2'];
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
			$username = $_SESSION['username'];
			$SQLString = "select * from $usersTable where username = '$username'";
			
			$QueryResult = mysqli_query($DBConnect, $SQLString, );
			$ResultId = mysqli_fetch_assoc($QueryResult);
				if(mysqli_num_rows($QueryResult) == 0){
				
					echo $username;
					print"project handler user does not exist";					
					header('refresh:3; url=incorrectLogin.php');					
					exit;					
				}
					else 
						 
							$ID = $ResultId['ID'];
							
							$SQLStringInsert = "insert into savedsearches(user_ID,weatherloc1, weatherloc2, timeloc1, timeloc2, currone, currtwo,
							curramt, curresult, midistance, kmdistance, ftdistance, meterdistance,
							lbamt, kgamt, name) values('$ID','$weatherloc1', '$weatherloc2', '$timeloc1', '$timeloc2', '$currone',
							'$currtwo', '$curramt', '$curresult', '$midistance', '$kmdistance', '$ftdistance',
							'$meterdistance', '$lbamt', '$kgamt','$name')";
							
							$QueryResult2 = mysqli_query($DBConnect, $SQLStringInsert );
							
							if($QueryResult2 === false)
								print"there was an error";
							else
								print"Your search has been saved";
								header('refresh:3; url=loggedIn.php');
								exit;						
					}
				
					mysqli_free_result($QueryResult);
					
			mysqli_close($DBConnect);
		

?>

</body>
</p>
</html>