<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

//start the session
session_start();

?>

<html lang="en">

<link rel="stylesheet" type="text/css" href="style.css">
<head>
<title>Incorrect Login</title>

</head>
<body>

<form action ="login1.php" method = "post">

<strong>Incorrect User Name or Password</strong>
<h2 id ="smallheadings">Log in to your Account</h2>
<p>User Name <input type="text" name ="username"/></p>
<p>password <input type ="password" name ="password"/></p>
<p><input type ="submit" class = "savebutton" value="Submit" /></p>
<a id = "savedsearches" href="createAccount.php"><b>Click Here to Create a New Account</b></a>

</form>
</body>


<html>
