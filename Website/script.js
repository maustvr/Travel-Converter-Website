
  

//Currency calculator

   const select = document.querySelectorAll('.currency');
    const number = document.getElementById("number");
    const output = document.getElementById("output");

//To populate the drop down boxes
    fetch('https://api.frankfurter.app/currencies').then((data) => data.json())
      .then((data) => {
        display(data);
      });


    function display(data) {
      const entries = Object.entries(data);
      for (var i = 0; i < entries.length; i++) {
        select[0].innerHTML += `<option value="${entries[i][0]}">${entries[i][0]} : ${entries[i][1]}</option>`;
        select[1].innerHTML += `<option value="${entries[i][0]}">${entries[i][0]} : ${entries[i][1]}</option>`;
      }
    }



    function updatevalue() {
      let currency1 = select[0].value;
      let currency2 = select[1].value;

      let value = number.value;
	  convert(currency1, currency2, value);	

     
    }
	
	//To convert chosen currencies


    function convert(currency1, currency2, value) {
      const host = "api.frankfurter.app";

      fetch(`https://${host}/latest?amount=${value}&from=${currency1}&to=${currency2}`)
        .then((val) => val.json())
        .then((val) => {
          console.log(Object.values(val.rates)[0]);
          console.log(Object.values(val.rates)[0]);
          output.value = Object.values(val.rates)[0];
		  const result = output.value;
		  output.innerHTML = result;
        });

    }
	
	//unit calculators
	
	function updateMiles() {
		MiInput.value=(KmInput.value*0.62137).toFixed(1); 
		}
		
	function updateKm() {
		KmInput.value =(MiInput.value/0.62137).toFixed(1);
		}
		
	function updateMeters() {
		MeterInput.value =(FtInput.value*.3048).toFixed(1);
		}
		
	function updateFeet() {
		FtInput.value =(MeterInput.value*3.28).toFixed(1);
		}
		
	function updatePounds() {
		lbInput.value =(KgInput.value*2.20462262185).toFixed(1);
		}
		
	function updateKilograms() {
		KgInput.value =(lbInput.value*.45359237).toFixed(1);
		}
	
	
	
	//Time and Date comparison
	
var button1 = document.querySelector('.button1');

var inputValue1 = document.querySelector('.inputValue1');

var datetime1 = document.querySelector('.datetime1');

button1.addEventListener('click',function time(){
  
fetch('https://timezone.abstractapi.com/v1/current_time/?api_key=42d622d868a541a08f00736056c1792b&location='+inputValue1.value+'')
  .then(response=>response.json())
 
  .then(data=> {
   
    var datetimeValue1 = data['datetime'];
  
 
var options = {weekday: "long", year: "numeric", month: "long", day: "numeric", hour: "numeric", minute: "numeric", second: "numeric"};
       var newdatetimeValue1 =
            new Date(datetimeValue1).toLocaleString('lan', options);
           
    datetime1.innerHTML =newdatetimeValue1;
  })
  .catch(err=> alert("Wrong city name!"))

})


var button2 = document.querySelector('.button2');

var inputValue2 = document.querySelector('.inputValue2');

var datetime2 = document.querySelector('.datetime2');

button2.addEventListener('click',function time(){
  
fetch('https://timezone.abstractapi.com/v1/current_time/?api_key=42d622d868a541a08f00736056c1792b&location='+inputValue2.value+'')
  .then(response=>response.json())
  
  .then(data=> {
   
    var datetimeValue2 = data['datetime'];
  
  var options = {weekday: "long", year: "numeric", month: "long", day: "numeric", hour: "numeric", minute: "numeric", second: "numeric"};
       var newdatetimeValue2 =
            new Date(datetimeValue2).toLocaleString('lan', options);
    
    
    datetime2.innerHTML =newdatetimeValue2;
  
  
  })
  .catch(err=> alert("Wrong city name!"))
})

//Weather comparison

var buttonA = document.querySelector('.buttonA');
var inputValueA = document.querySelector('.inputValueA');
var city1 = document.querySelector('.city1');
var desc1 = document.querySelector('.desc1');
var tempC = document.querySelector('.tempC');
var tempF = document.querySelector('.tempF');



buttonA.addEventListener('click',function(){
fetch ('https://api.openweathermap.org/data/2.5/weather?q='+inputValueA.value+'&appid=40b629ea853052ad08632c88908f4c5e&units=metric')
.then(response=> response.json())

  
.then(data => {
  var city1Value = data['name'];
 var tempCValue = Math.round(data['main']['temp']);
 
  var desc1Value = data['weather'][0]['description'];
 
  var iconAValue = data['weather'][0]['icon'];
 
  let icon1 = data.weather[0].icon;

  city1.innerHTML =city1Value;
  tempC.innerHTML =tempCValue + ' °C';
  tempF.innerHTML =Math.round(tempCValue * 9/5 + 32) + ' °F';
  desc1.innerHTML =desc1Value;

  
})
.catch(err=> alert("Wrong city name!"))
   
})

var buttonB = document.querySelector('.buttonB');
var inputValueB = document.querySelector('.inputValueB');
var city2 = document.querySelector('.city2');
var desc2 = document.querySelector('.desc2');
var tempC2 = document.querySelector('.tempC2');
var tempF2 = document.querySelector('.tempF2');





buttonB.addEventListener('click',function(){
fetch ('https://api.openweathermap.org/data/2.5/weather?q='+inputValueB.value+'&appid=40b629ea853052ad08632c88908f4c5e&units=metric')
.then(response=> response.json())
 
  
.then(data => {
  var city2Value = data['name'];
 var tempC2Value = Math.round(data['main']['temp']);
 
  var desc2Value = data['weather'][0]['description'];
  
  city2.innerHTML =city2Value;
  tempC2.innerHTML =tempC2Value + ' °C';
  tempF2.innerHTML =Math.round(tempC2Value * 9/5 + 32) + ' °F';
 
  desc2.innerHTML =desc2Value;
 
  
})
.catch(err=> alert("Wrong city name!"))
   
})

/*
(function() {
	var buttonA = document.querySelectorAll('.buttonA');
	var buttonB = document.querySelectorAll('buttonB');
	var inputValueA = document.querySelectorAll('inputValueA');
	var inputValueB = document.querySelectorAll('inputValueB');
	var button1 = document.querySelectorAll('.button1');
	var button2 = document.querySelectorAll('button2');
	var inputValue1 = document.querySelectorAll('.inputValue1');
	var inputValue2 = document.querySelectorAll('inputValue2');
	var inputValue = document.querySelectorAll('inputValue');
	var currency =document.querySelectorAll('.form-input');
	
buttonA.addEventListener('keypress', function(event) {
	if(event.keyCode ==13) {
		event.preventDefault();
		return false;
	}
});
buttonB.addEventListener('keypress', function(event) {
	if(event.keyCode ==13) {
		event.preventDefault();
		return false;
	}
});

weatherloc1.addEventListener('keydown', function(event) {
	if(event.keyCode ==13) {
		event.preventDefault();
		return false;
	}
});

inputValueA.addEventListener('keydown', function(event) {
	if(event.keyCode ==13) {
		event.preventDefault();
		return false;
	}
});
inputValueB.addEventListener('keypress', function(event) {
	if(event.keyCode ==13) {
		event.preventDefault();
		return false;
	}
});
inputValue1.addEventListener('keypress', function(event) {
	if(event.keyCode ==13) {
		event.preventDefault();
		return false;
	}
});
inputValue2.addEventListener('keypress', function(event) {
	if(event.keyCode ==13) {
		event.preventDefault();
		return false;
	}
});
inputValue.addEventListener('keypress', function(event) {
	if(event.keyCode ==13) {
		event.preventDefault();
		return false;
	}
});

button1.addEventListener('keypress', function(event) {
	if(event.keyCode ==13) {
		event.preventDefault();
		return false;
	}
});

button2.addEventListener('keypress', function(event) {
	if(event.keyCode ==13) {
		event.preventDefault();
		return false;
	}
});

currency.addEventListener('keypress', function(event) {
	if(event.keyCode ==13) {
		event.preventDefault();
		return false;
	}
});


}());*/