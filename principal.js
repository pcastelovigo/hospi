function calcular_edad(){
var birthdate = new Date(document.getElementById('fechanacimiento').value);
var cur = new Date();
var diff = cur-birthdate; // This is the difference in milliseconds
var age = Math.floor(diff/31557600000); // Divide by 1000*60*60*24*365.25
$("#salida_edad").html(age);
}


