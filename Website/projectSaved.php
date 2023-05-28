<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

//start the session
session_start();

?>

<html lang="en">

<link rel="stylesheet" type="text/css" href="style.css">
<script src ="script.js"></script>
<head>

<style>
<title>Saved Searches</title>
</style>

</head>
<p>
<body>

<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));
	
			
	$DBConnect= mysqli_connect("", "", "", "");
	
	if($DBConnect === false)
		print"Unable to connect to the database, error, number:".mysqli_errno();

		else{
				
			$usersTable = "users";
			$savedTable = "savedsearches";
			$username = $_SESSION['username'];
			$search = stripslashes($_POST['search']);
			$_SESSION['search'] = $search;	
			
			$SQLString = "select * from $usersTable where username = '$username'";			
				
			$QueryResult = mysqli_query($DBConnect, $SQLString);
			$ResultId = mysqli_fetch_assoc($QueryResult);
				if(mysqli_num_rows($QueryResult) == 0)
					print"incorrect user name";
					
						else 
							$username = $ResultId['username'];
							
							print"<h3>welcome $username</h3>";							
							$ID = $ResultId['ID'];
							
							$SQLString1 = "select * from $savedTable where Count ='$search'";
							
							$QueryResult2 = mysqli_query($DBConnect, $SQLString1);
							if($QueryResult2 === false)
							print"there was an error";
						else
					
							
							$Search = mysqli_fetch_assoc($QueryResult2);
						
							$weatherloc1 = $Search['weatherloc1'];
							$weatherloc2 = $Search['weatherloc2'];
							$timeloc1 = $Search['timeloc1'];
							$timeloc2 = $Search['timeloc2'];
							$currone = $Search['currone']; 
							$currtwo = $Search['currtwo'];
							$curramt = $Search['curramt'];
							$curresult = $Search['curresult'];
							$midistance = $Search['midistance'];
							$kmdistance = $Search['kmdistance'];
							$ftdistance = $Search['ftdistance'];
							$meterdistance = $Search['meterdistance'];
							$lbamt = $Search['lbamt'];
							$kgamt = $Search['kgamt'];
	
					}
				
					mysqli_free_result($QueryResult);
									
		mysqli_close($DBConnect);

?>

<div id="heading">
	<h1>Saved Searches</h1>
</div>
	<br>
	<a id = "logIn" href="loggedIn.php"><b>Home</b></a>
	<a id = "logIn" href="loggedOut.php"><b>Log Out</b></a>
	<br>

	<div id="weather">
	<div class ="savedlocation">
	<div class="display">
	<div id="smallheadings"
			<br>
			<h2 id ="savedheadings">First Saved Location</h2>
			</div>
			<h2 class="city1"><?php echo $weatherloc1;?></h2>
			<div class ="middle">
				<div class = "degrees">
					<div class="tempC">°C
					</div>
					<div class="tempF">°F
					</div>
				</div>
					<h3 class="desc1">Description</h3>
				</div>
				</div>
				</div>

		<div class ="savedlocation">		
			<div class="display">
				<div id="smallheadings"
				<br>
				<h2>Second Saved Location</h2>
				</div>
				<h2 class="city2"><?php echo $weatherloc2;?></h2>
				<div class ="middle">
					<div class = "degrees">
						<div class="tempC2">°C
						</div>						
						<div class="tempF2">°F
						</div>						
					</div>						
					<div><h3 class="desc2">Description</h3>
					</div>					
				</div>
			</div>
			</div>			
		</div>
		</div>
		<script>

			var inputValueA = "<?php echo "$weatherloc1"?>";
			var city1 = document.querySelector('.city1');
			var desc1 = document.querySelector('.desc1');
			var tempC = document.querySelector('.tempC');
			var tempF = document.querySelector('.tempF');
		
			fetch ('https://api.openweathermap.org/data/2.5/weather?q='+inputValueA+'&appid=40b629ea853052ad08632c88908f4c5e&units=metric')
			.then(response=> response.json())
			.then(data => {
		
			var tempCValue = Math.round(data['main']['temp']);
 
			var desc1Value = data['weather'][0]['description'];
	
			var iconAValue = data['weather'][0]['icon'];
 
			let icon1 = data.weather[0].icon;
 
			
			tempC.innerHTML =tempCValue + ' °C';
			tempF.innerHTML =Math.round(tempCValue * 9/5 + 32) + ' °F';
			desc1.innerHTML =desc1Value;
			
			
	
			var inputValueB = "<?php echo "$weatherloc2"?>";
			var city2 = document.querySelector('.city2');
			var desc2 = document.querySelector('.desc2');
			var tempC2 = document.querySelector('.tempC2');
			var tempF2 = document.querySelector('.tempF2');
			
			fetch ('https://api.openweathermap.org/data/2.5/weather?q='+inputValueB+'&appid=40b629ea853052ad08632c88908f4c5e&units=metric')
			.then(response=> response.json())
			.then(data => {
				var city2Value = data['name'];
				var tempC2Value = Math.round(data['main']['temp']);
				var desc2Value = data['weather'][0]['description'];	
				tempC2.innerHTML =tempC2Value + ' °C';
				tempF2.innerHTML =Math.round(tempC2Value * 9/5 + 32) + ' °F';
				desc2.innerHTML =desc2Value;	
				})
			})
		</script>
		<div class="timeandcurrency">	
		<div class ="savedtimedate">
			<div id="smallheadings"
			<br>
			<h2>Time Difference</h2>
			</div>		
		<br>
		<table class="savedtimelocation">
			<col class="one">
			<col class="two">				
				<tr>
				<td class="cityname1"><?php echo $timeloc1;?></td>
				<td class="time1">dateandtime1</td>
				</tr>				
		<script>
			var inputValue1 = "<?php echo "$timeloc1";?>"
			var time1 = document.querySelector('.time1'); 
			
			fetch('https://timezone.abstractapi.com/v1/current_time/?api_key=42d622d868a541a08f00736056c1792b&location='+inputValue1+'')
			.then(response=>response.json())
 
			.then(data=> {
   
				var timeValue1 = data['datetime'];
				var options = {weekday: "long", year: "numeric", month: "long", day: "numeric", hour: "numeric", minute: "numeric", second: "numeric"};
				var newtimeValue1 =
				new Date(timeValue1).toLocaleString('lan', options);
           
				time1.innerHTML =newtimeValue1;
		
			})
		
		</script>					
				<tr>
				<td class="cityname2"><?php echo $timeloc2;?></td>
				<td class="time2">dateandtime2</td>
				</tr>
				</table>
				<br>
	
		</div>		
		<script>
				
			setTimeout(function() {
		
				var inputValue2 = "<?php echo "$timeloc2";?>"
				var time2 = document.querySelector('.time2');

				fetch('https://timezone.abstractapi.com/v1/current_time/?api_key=42d622d868a541a08f00736056c1792b&location='+inputValue2+'')
				.then(response=>response.json())
 
				.then(data=> {
   
					var timeValue2 = data['datetime'];
					var options = {weekday: "long", year: "numeric", month: "long", day: "numeric", hour: "numeric", minute: "numeric", second: "numeric"};
					var newtimeValue2 =
					new Date(timeValue2).toLocaleString('lan', options);
           
					time2.innerHTML =newtimeValue2;
		
					})
				}, 3000);
			
		</script>

	<div class="currency">

	<div id="smallheadings"
			<br>
			<h2>Currency Exchange</h2>
			</div>
			<br>
			<table class ="savedcurrconverter">
			<col class="curr-one">
			<col class="curr-two">
			
			<tr>
			
			<td class="currency1" id="currone"><?php echo $currone;?></td>
			<td class="curramount" id="number"><?php echo $curramt;?></td>
			</tr> 
			<tr>
			<td class="currency1" id="currtwo"><?php echo $currtwo;?></td>
			<td class="curramount" id="output" placeholder = "0000"><?php echo $curresult;?></td>
			</tr>
		</table>
		</div>		
	</div>
	</div>

	<div class="convertedunits"> 
		<div id="smallheadings"
			<br>
			<h2>Unit Conversions</h2>
			</div>
			</div>
			<br>
			<div class="savedunitconversions">
			
			<table class="unitsconverted">
			<col id="column-one">
			<col id="column-two">
			
			<tr>
			<td class="unit">Kilometers:</td>
			<td><id="kmresult"placeholder = ""><?php echo $kmdistance ?></td>
			</tr>
			
			<tr>
			<td class="unit">Miles:</td>
			<td><id="miresult"placeholder = ""><?php echo $midistance ?> </td>
			</tr>
			</table>
			<table class="unitsconverted">
			<col id="column-one">
			<col id="column-two">
			
			<tr>
			<td class="unit">Meters:</td>
			<td><id="meterresult"placeholder = ""><?php echo $meterdistance ?></td>
			</tr>
			
			<tr>
			<td class="unit">Feet:</td>
			<td><id="ftresult"placeholder = ""><?php echo $ftdistance ?></td>
			</tr>
			</table>
			<table class="unitsconverted">
			<col id="column-one">
			<col id="column-two">
			
			<tr>
			<td class="unit">Kilograms:</td>
			<td><id="kgresult"placeholder = ""><?php echo $kgamt ?></td>
			</tr>
			
			<tr>
			<td class="unit">Pounds:</td>
			<td><id="lbresult"placeholder = ""><?php echo $lbamt?> </td>
			</tr>
			</table>
	</div>		
	
</div>	

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src ="script.js"></script>


</body>
</p>
</html>