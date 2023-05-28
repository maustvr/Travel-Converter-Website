<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

//start the session
session_start();
?>

<html lang="en">
<head>
<title>Create a new Account</title>

</head>
<body>

<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
	
	
			
	$DBConnect= mysqli_connect("", "" , "", "");
	
	if($DBConnect === false)
		print"Unable to connect to the database, error, number:".mysqli_errno();
			
				
			else{
				$usersTable = "users";
				$username = stripslashes($_POST['username']);
				$password = stripslashes($_POST['password']);
				$hash = password_hash($password, PASSWORD_DEFAULT);
				$_SESSION['username'] = $username;
				$SQLString = "select * from $usersTable where username = '$username'";
								
				$QueryResult = mysqli_query($DBConnect, $SQLString, );
				if(mysqli_num_rows($QueryResult) == 0){
			
					$SQLString2 ="insert into $usersTable(username, password) values('$username', '$hash')";
					$QueryResult2 = mysqli_query($DBConnect, $SQLString2, );
						if($QueryResult2 === true) {
							print"<h2>Your account has been added<br><br></h2>";
							header('refresh:3; url=loggedIn.php');
							exit;
							} else{
								print"<h2>username already exists.<br><br></h2>";
								header('refresh:3; url=createAccount1.php');
								exit;					
				}//close find database
		mysqli_free_result($QueryResult);
		
		}//close if able to connect	
		mysqli_close($DBConnect);
}		

?>			
</body>			
<html>