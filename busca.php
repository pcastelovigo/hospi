<?php

$bdd = new mysqli("localhost","marga","alfredo","hospital");
if($bdd->connect_error) { die("Fallo de conexion con DB, zen:". $bdd->connect_error); }

//var_dump($_POST);


$sql = "SELECT numhistoria from aseguradora where documento = '".$_POST['documento']."'";
$query = $bdd->query($sql);
if ($query->num_rows > 0) { $paciente_existe = 1; } else { $paciente_existe = 0; }


if ($paciente_existe == 0) {
$sql = "INSERT INTO pacientes (nombre, 1apellido, 2apellido, sexo, fechanac, tipodoc, documento, direccion, localidad, provincia, codigopostal, telefonom, telefonof, correoelectronico ) VALUES ('".$_POST['nombre']."', '".$_POST['papellido']."', '".$_POST['sapellido']."', '".$_POST['sexo']."', '".$_POST['fechanac']."', '".$_POST['tipodoc']."', '".$_POST['documento']."', '".$_POST['direccion']."', '".$_POST['localidad']."', '".$_POST['provincia']."', '".$_POST['cp']."', '".$_POST['telefono1']."', '".$_POST['telefono2']."', '".$_POST['email']."')";
$query = $bdd->query($sql);
$sql = "INSERT INTO aseguradora ( documento ) VALUES ('".$_POST['documento']."')";
$query = $bdd->query($sql);
$sql = "SELECT numhistoria from aseguradora where documento = '".$_POST['documento']."'";
$query = $bdd->query($sql);

while($salida = $query->fetch_assoc()){
echo "<p>Número de historia: ".sprintf('%06d', $salida['numhistoria'])."</p>";
echo "<p id=\"pegatina\" style=\"display:none\">".$salida['numhistoria']."</p>";
echo "<p>Nombre y apellidos: ".$_POST['nombre']." ".$_POST['papellido']." ".$_POST['sapellido']."</p>";
echo "<p>Fecha de nacimiento: ".$_POST['fechanac']."</p>";
} }

if ($paciente_existe == 1) {
$sql = "SELECT * FROM pacientes where documento = '".$_POST['documento']."'";
$query = $bdd->query($sql);
$sql_h = "SELECT numhistoria from aseguradora where documento = '".$_POST['documento']."'";
$query_h = $bdd->query($sql_h);
while($salida_h = $query_h->fetch_assoc()){
$numerohistoria = $salida_h['numhistoria'];
}

while($salida_p = $query->fetch_assoc()){
echo "<p>Número de historia: ".sprintf('%06d', $numerohistoria)."</p>";
echo "<p id=\"pegatina\" style=\"display:none\">".sprintf('%06d', $numerohistoria)."</p>";
echo "<p>Nombre y apellidos: ".$salida_p['nombre']." ".$salida_p['1apellido']." ".$salida_p['2apellido']."</p>";
echo "<p>Fecha de nacimiento: ".$salida_p['fechanac']."</p>";
}

$sql = "SELECT * FROM aseguradora where documento = '".$_POST['documento']."'";
$query = $bdd->query($sql);
while($salida_a = $query->fetch_assoc()){
$aseguradora = $salida_a['nombre_aseguradora'];
$numerotarjeta = $salida_a['numero_tarjeta'];
} }

?>

<p><strong>Financiación del episodio</strong></p>
<div class="input-group mb-3">
  <span class="input-group-text">Nombre aseguradora</span>
<select id="aseguradora" class="form-select">
  <option selected><?php if ($paciente_existe == 1) {echo $aseguradora;} else {echo "Escoger aseguradora"; } ?></option>
  <option value="ADESLAS">ADESLAS</option>
  <option value="SANITAS">SANITAS</option>
  <option value="ASISA">ASISA</option>
  <option value="Catalana Occidente">Catalana Occidente</option>
  <option value="Seguridad Social">Seguridad Social</option>
  <option value="Privado">Privado</option>
</select>
</div>
<div class="input-group mb-3">
  <span class="input-group-text">Numero de tarjeta</span>
  <input id="numtarjeta" type="text" class="form-control" <?php if ($paciente_existe == 1) {echo " value=\"".$numerotarjeta."\""; } else {echo " placeholder=\"000000000 0 000000 000\""; } ?>>
</div>
<div class="input-group mb-3">
  <span class="input-group-text">Numero de autorizacion</span>
  <input type="text" id="auth" class="form-control" placeholder="00000000A">
</div>
<div class="input-group mb-3">
<span class="input-group-text">Prestación</span>
<select id="prestacion" class="form-select">
<option value="null" selected>Escoger opción prestación</option>
<option value="consulta">Consulta</option>
<option value="radiografia">Radiografía</option>
<option value="tac">TAC</option>
<option value="gammagrafia">Gammagrafía</option>
<option value="resonancia">Resonancia mágnetica</option>
<option value="biopsia">Biopsia</option>
<option value="asangre">Analítica de sangre</option>
<option value="aorina">Analítica de orina</option>
<option value="radioterapia">Radioterapia</option>
<option value="quimioterapia">Quimioterapia</option>
<option value="hormonoterapia">Hormonoterapia</option>
</select>
</div>

<p><strong>Citación</strong></p>
<div class="input-group mb-3">
<span class="input-group-text">Servicio</span>
<select id="servicio" class="form-select">
<option value="null" selected>Escoger servicio</option>
<option value="Medicina de familia">Medicina de familia</option>
<option value="Urología">Urología</option>
<option value="Pruebas diagnósticas">Pruebas diagnósticas</option>
<option value="anestesia">Anestesia</option>
<option value="Quirófano">Quirófano</option>
<option value="Enfermería">Enfermería</option>
<option value="Radioterapia">Radioterapia</option>
</select>
</div>

<div class="input-group mb-3">
  <span class="input-group-text">Facultativo</span>
  <input type="text" id="medico" class="form-control" placeholder="Nombre...">
</div>



<div class="input-group mb-3">
<span class="input-group-text">CITA</span>
<input id="cita" class="form-control" type="date" min="2023-01-01">
<span class="input-group-text">HORA</span>
<input type="time" id="hora" min="08:00" max="19:00" required>
</div>


</div>


</div>



