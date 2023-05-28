<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

//start the session
session_start();
$username = $_SESSION['username'];
print"Welcome $username";

?>

<html lang="en">

<link rel="stylesheet" type="text/css" href="style.css">
<script src ="script.js"></script>
<head>
<title>Select search by ID</title>
<style>
</style>

</head>
<p>
<body>
<h2 id ="loginheadings">Select Search by ID</h2>
<form method="POST" action="projectSaved.php">
<p>Select Search: <input type="text" name ="search"/></p>
<p><input type ="submit" class="savebutton"   value="Submit" /></p>
</form>

<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
	
			
	$DBConnect= mysqli_connect(" ", " ", " ", " ");
	
	if($DBConnect === false)
		print"Unable to connect to the database, error, number:".mysqli_errno();

		else{
					
			$usersTable = "users";
			$savedTable = "savedsearches";
			$username = $_SESSION['username'];							
			$SQLString = "select * from $usersTable where username = '$username'";			
			
			$QueryResult = mysqli_query($DBConnect, $SQLString);
			$ResultId = mysqli_fetch_assoc($QueryResult);
			if(mysqli_num_rows($QueryResult) == 0)
					print"incorrect user name";					
						else 							
							$username = $ResultId['username'];							
							$ID = $ResultId['ID'];
							
							$SQLString2 ="Select * from $savedTable where user_ID = '$ID'";
							
							
							
							$QueryResult2 = mysqli_query($DBConnect, $SQLString2);
							if($QueryResult2 === false)
							print"There are no records in the database";
				
						else{							
							print"Here is a list of your searches";
							print"<table width ='50%' border ='1'>";
							print"<tr><th>Count</th><th>Search Name</th>";	
							while(($Row = mysqli_fetch_assoc($QueryResult2)) != false)
							
						{
							print"<tr><td>{$Row['Count']}</td>";
							print"<td>{$Row['name']}</td>";
																	
					}//end while
								
					print"</table>";
														
				}		
													
			}				
					mysqli_free_result($QueryResult);
									
		mysqli_close($DBConnect);

?>

</body>
<html>