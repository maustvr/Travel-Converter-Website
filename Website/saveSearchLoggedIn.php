<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

//start the session
session_start();

?>

<?php
	
	$DBConnect= mysqli_connect(" ", " ", " ", " ");
	
	if($DBConnect === false)
		print"Unable to connect to the database, error, number:".mysqli_errno();

		else{
			
			$usersTable = "users";
			$savedTable = "savedsearches";
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
			$_SESSION['meterdistance '] = $meterdistance;
			$_SESSION['lbamt'] = $lbamt;
			$_SESSION['kgamt'] = $kgamt;
			$_SESSION['name'] = $name;
			
			$username = $_SESSION['username'];
			$SQLString = "select * from $usersTable where username = '$username'";
			
				
			$QueryResult = mysqli_query($DBConnect, $SQLString);
			$ResultId = mysqli_fetch_assoc($QueryResult);
			if(mysqli_num_rows($QueryResult) == 0) {
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
							'$meterdistance', '$lbamt', '$kgamt', '$name')";
	
							$QueryResult2 = mysqli_query($DBConnect, $SQLStringInsert);
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


<html>
