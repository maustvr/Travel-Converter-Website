<?php //error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

//start the session
session_start();


?>


<html lang="en">

<link rel="stylesheet" type="text/css" href="style.css">
<head>
</head>
<body>

<div class="logins">
<h2 id ="loginheadings">Create an Account</h2>
<form method="POST" action="projectNewAccount.php">
<p id="username">User Name <input type="text" name ="username"/></p>
<p id="password" >password <input type ="password" name ="password"/></p>
<p><input type ="submit" class = "savebutton" value="Submit" /></p>
</form>
<a id = "loginLink" href='projectlogin.php'>click here to log in to an existing account </a><br>


</body>
</p>
</html>