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

	//enter database connection details	
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
						
			$SQLString = "select * from $usersTable where username = '$username'";	
			$QueryResult = mysqli_query($DBConnect, $SQLString, );
			$ResultId = mysqli_fetch_assoc($QueryResult);
			if(mysqli_num_rows($QueryResult) == 0) {
							
					header("Location: badLogin.php");
					exit;					
				}else 
					$PW = $ResultId['password'];
					$username = $ResultId['username'];
					if (password_verify($password, $PW)) {							
							$ID = $ResultId['ID'];
							$_SESSION['logged_in'] = true;
							header("Location: loggedIn.php");
							exit;
							
							}else 
						print"incorrect user name or password";
						header("Location: badLogin.php");
						exit;						
					}
									
					mysqli_free_result($QueryResult);
					
			mysqli_close($DBConnect);
		
		
		?>