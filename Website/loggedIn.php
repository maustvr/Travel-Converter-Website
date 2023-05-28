<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

//start the session
session_start();
$username = $_SESSION['username'];
$weatherloc1 = $_SESSION['weatherloc1'];
$weatherloc2 = $_SESSION['weatherloc2'];
$timeloc1 = $_SESSION['timeloc1'];
$timeloc2 = $_SESSION['timeloc2'];
$currone = $_SESSION['currone'];
$curramt = $_SESSION['curramt'];
$kmdistance = $_SESSION['kmdistance'];
$midistance = $_SESSION['midistance'];
$meterdistance = $_SESSION['meterdistance'];
$ftdistance = $_SESSION['ftdistance'];
$kgamt = $_SESSION['kgamt'];
$lbamt = $_SESSION['lbamt'];

?>

<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" type="text/css" href="style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<head>
<style>
<Title>Travel Unit Converters</title>
</style>
</head>
<body>

<?php error_reporting (E_ALL ^ (E_NOTICE | E_DEPRECATED));

	echo "<h3>Welcome " . $_SESSION['username'] . "</h3>";
	
?>


<div>
</div>
<form id="form" name="myform" form action="saveSearchLoggedIn.php" method="post">

<div id="heading">
	<h1>Travel Unit Converters</h1>
</div>

<br>

<a id = "logIn" href="searchList.php"><b>Saved Searches </b></a>  <a id = "logIn" href="loggedOut.php"><b>Log Out</b></a>
<br>

<div class="flexContainer">

	<div class="leftcolumn">
		<div class ="weather">
			<div id="tempcompare">
				<h2>Compare temperatures in two locations</h2>
				<br>
				<br>
			</div>
			<br>
				<div class ="location">
					<div class ="input">
						<label for="weatherloc1">Enter First Weather Location</label><br>
						<input type ="text" id="weatherloc1" class="inputValueA" name ="weatherloc1"  placeholder="Enter a city" >
						<input id="buttonA" type="button" value="search" class="buttonA">

					</div>
					<div class="display">
						<h3 class="city1">First Location</h3>
						<div class ="middle">
							<div class = "degrees">
								<div class="tempC">°C
								</div>
								
								<div class="tempF">°F
								</div>
								
							</div>
							<h3 class="desc1">description</h3>
							
						</div>
					</div>
				</div>

			<div class ="location">
				<div class ="input">
					<label for="weatherloc2">Enter Second Weather Location</label><br>
					<input type ="text" id="weatherloc2" class="inputValueB" placeholder="Enter a city" name="weatherloc2">
					<input type="button" value="search" class="buttonB">
				</div>
				<div class="display">
					<h3 class="city2">Second Location</h3>
					<div class ="middle">
						<div class = "degrees">
							<div class="temp2"></div>
							<div class="tempC2">°C
					</div>
						<div class="tempF2">°F</div>
						
					</div>
						<div><h3 class="desc2">description</h3>
					</div>
					<br>
					
				</div>
			</div>
			</div>
		
		</div>
		<script>

		var inputValueA = "<?php echo "$weatherloc1"?>";
		//document.write(inputValueA);
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
		weatherloc1.value= "<?php echo "$weatherloc1"?>";
		city1.innerHTML="<?php echo "$weatherloc1"?>";
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
	
			weatherloc2.value ="<?php echo "$weatherloc2"?>";
			city2.innerHTML = "<?php echo "$weatherloc2"?>";
			tempC2.innerHTML =tempC2Value + ' °C';
			tempF2.innerHTML =Math.round(tempC2Value * 9/5 + 32) + ' °F';
			desc2.innerHTML =desc2Value;	
	   })
	   })
	</script>
		<br>
		
		<div class ="timedate">
		<div class ="timezone">
			<!--<div id="smallheadings"-->
	
			
			<h2>Time Zone Comparison</h2>
		
		<div class = "search">
			<table class="timesearch">
				<col class="city">
				<col class="submit">
					<tr>
						<label for="timeloc1" style="color: #00538C;">Enter First Timezone Location</label><br>
						<td id="city"><input type ="text" id='timeloc1' class="inputValue1" placeholder="Enter a city " name="timeloc1"></td>
						<td id ="search"><input type="button" value="search" class="button1"></td>
						<td class="datetime1">Date, Time</td>
					</tr>
					<script>
		
		var inputValue1 = "<?php echo "$timeloc1";?>"

		var time1 = document.querySelector('.datetime1');
		var timeloc1 = document.querySelector('.inputValue1');
		
  
		 fetch('https://timezone.abstractapi.com/v1/current_time/?api_key=42d622d868a541a08f00736056c1792b&location='+inputValue1+'')
		.then(response=>response.json())
 
		.then(data=> {
   
		var timeValue1 = data['datetime'];
		var options = {weekday: "long", year: "numeric", month: "long", day: "numeric", hour: "numeric", minute: "numeric", second: "numeric"};
       var newtimeValue1 =
        new Date(timeValue1).toLocaleString('lan', options);
        
		timeloc1.value = "<?php echo "$timeloc1";?>"
		time1.innerHTML =newtimeValue1;
		
		})
		
		</script>	
			</table>
			
			<br>
			
			<table class="timesearch">
				<col class="city">
				<col class="submit">
			<tr>
				<label for="timeloc2" style="color: #00538C;">Enter Second Timezone Location</label><br>
				<td id="city"><input type ="text" id='timeloc2'class="inputValue2" placeholder="Enter a city " name="timeloc2"></td>
				<td id ="search"><input type="button" value="search" class="button2"></td>
				<td class="datetime2">Date, Time</td>
			</tr>			
			</table>
			
			<br>
		</div>
		</div>
		</div>
		<script>
		
		
		
		
		setTimeout(function() {
			
		//var inputValue2 = document.querySelector('.cityname2');
		var inputValue2 = "<?php echo "$timeloc2";?>"
		var time2 = document.querySelector('.time2');

		fetch('https://timezone.abstractapi.com/v1/current_time/?api_key=42d622d868a541a08f00736056c1792b&location='+inputValue2+'')
		.then(response=>response.json())
 
		.then(data=> {
   
		var timeValue2 = data['datetime'];
		var options = {weekday: "long", year: "numeric", month: "long", day: "numeric", hour: "numeric", minute: "numeric", second: "numeric"};
       var newtimeValue2 =
        new Date(timeValue2).toLocaleString('lan', options);
        timeloc2.value = "<?php echo "$timeloc2";?>";   
		datetime2.innerHTML =newtimeValue2;
		
		})
		}, 3000);
		
		
	
</script>
		
		
		 <div class="currencyconversion">
    <div class="currency-converter">
	
      <h2>Currency Converter</h2>
	  <br>

      <div class="field grid-50-50">
	  
		<div class="colmun-left">
          <div class="select">
			<label for="currone" style="color: #00538C;">Select First Currency</label><br>
            <select name="currone" class="currency" onchange="updatevalue()" value ="<?php echo $currone;?>"></select>
          </div>
        </div>
        <div class="colmun col-right">
		<label for="number" style="color: #00538C;">Enter Amount of First currency</label><br>
          <input type="text" class="form-input" id="number" placeholder="Please enter an amount" onchange="updatevalue()" name="curramt" value="<?php echo $curramt;?>">
        </div>
       
      </div>

      <div class="field grid-50-50">
	  
		<div class="colmun col-left">
          <div class="select">
            <label for="currtwo" style="color: #00538C;">Select Second Currency</label><br>
			<select name="currtwo" id="currtwo" class="currency" onchange="updatevalue()"></select>
          </div>
        </div>
        <div class="colmun col-right">
		<br>
          <input type="text" class="form-input" id="output" placeholder="00000"  name="curresult" onchange="updatevalue()">
        </div>
        
      </div>

    </div>
  </div>
  <br>
  <br>
		
		<div class="logins">
		
		</div>
	</div>
	<br>

	<div class="rightcolumn">
	
		<div class="calculators"> 
			<div id="smallheadings"
			<br>
			<h2>Kilometers to Miles</h2>
			</div>
			
			<h3>Please enter a distance in kilometers or miles</h3>
			<table class="unitconverter" name ="unitconverter">
			<col id="column-one">
			<col id="column-two">			
			<tr>
			<td class="unit"><label for="KmInput" style ="font-size:25px">Kilometers:</label></td>
				
			<td><input id= "KmInput" class="inputValue" placeholder="Enter a number" name ="kmdistance" oninput= updateMiles() value ="<?php echo $kmdistance;?>">			
			</tr>			
			<tr>
			<td class="unit"><label for="MiInput" style ="font-size:25px">Miles:</label></td>
				
			<td><input id ="MiInput" class="inputValue" placeholder="Enter a number" name="midistance" oninput= updateKm() value ="<?php echo $midistance;?>">
			</tr>
			</table>

			<div id="smallheadings"
			<br>
				<h2>Meters to Feet</h2>
			</div>
			
			<h3>Please enter a distance in meters or feet</h3>
			<table class="unitconverter">
			<col id="column-one">
			<col id="column-two">
			
			<tr>
			
			<td class="unit"><label for="MeterInput" style ="font-size:25px" >Meters:</label></td>
			<td><input id= "MeterInput" class="inputValue" placeholder="Enter a number" name="meterdistance" oninput= updateFeet() value ="<?php echo $meterdistance;?>">			
			</tr>			
			<tr>
			
			<td class="unit"><label for="FtInput" style ="font-size:25px">Feet:</label></td>
			<td><input id= "FtInput" class="inputValue" placeholder="Enter a number" name="ftdistance" oninput= updateMeters() value ="<?php echo $ftdistance;?>">			
			</tr>
			</table>
			
			<div id="smallheadings"
			<br>
				<h2>Kilograms to Pounds</h2>
			</div>
			
			<h3>Please enter a distance in kilograms to pounds</h3>
			<table class="unitconverter">
			<col id="column-one">
			<col id="column-two">
			
			<tr>
			
			<td class="unit"><label for="KgInput" style ="font-size:25px">Kilograms:</label></td>
			<td><input id= "KgInput" class="inputValue" placeholder="Enter a number" name="kgamt" oninput= updatePounds() value ="<?php echo $kgamt;?>">
			</tr>
			<tr>
			
			<td class="unit"><label for="lbInput" style ="font-size:25px">Pounds:</label></td>
			<td><input id= "lbInput" class="inputValue" placeholder="Enter a number" name="lbamt" oninput= updateKilograms() "<?php echo $lbamt;?>>
			
			</tr>
			</table>			
			<div id="smallheadings"
			<br>
			<div class="logins">
				<h2 id="loginheadings">Save Search</h2>
					<div class="loginentry">
						<label for="searchName" style="color: #00538C;">Name for Saved Search: </label>
						<input type ="text" id="searchName" class="searchName" name ="searchName" placeholder="Enter a name for your search" >
						<p><input type ="button" id="submit-btn" class="savebutton" value="Save" onclick="submit_button ()" /></p>
					</div>
					<script>
						function submit_button(){
							var btn=document.getElementById('submit-btn');
							btn.setAttribute('type', 'submit');
						}		
		</script>			
			</div>	
		</div>		
		</div>	
		</div>		
	</div>
	</div>
	</div>	
	</form>		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src ="script.js"></script>
		
</body>
</html>
