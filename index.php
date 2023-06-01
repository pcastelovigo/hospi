<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Hospital Carmen Porto"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Usuario no autorizado';
    exit;
} else { $autorizado = 1; }
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión Pacientes Hospital Privado Carmen Porto</title>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha256-BRqBN7dYgABqtY9Hd4ynE+1slnEw+roEPFzQ7TRRfcg=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha256-m81NDyncZVbr7v9E6qCWXwx/cwjuWDlHCMzi9pjMobA=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="principal.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha256-wLz3iY/cO4e6vKZ4zRmo4+9XDpMcgKOvv/zEU3OMlRo=" crossorigin="anonymous">
  </head>
  <body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
<div>
    <img src="imagen.jpg">
<div>
	<small>Plaza de España, nº1, 15002 A Coruña<br>
	Teléfono: 981 555 555<br>
	Correo-e: hospital@hospitalcarmenporto.com.es</small>
</div></div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left:5em">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Gestión administrativa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="histo.php">Gestión clínica</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<br>
<br>
<div class="container">
  <div class="row align-items-start">
    <div class="col">
<div class="input-group mb-3">
  <span class="input-group-text">Nombre</span>
  <input type="text" id="nombre" class="form-control" placeholder="Nombre">
</div>
<div class="input-group mb-3">
  <span class="input-group-text">1er apellido</span>
  <input id="papellido" type="text" class="form-control" placeholder="1er apellido">
</div>
<div class="input-group mb-3">
  <span class="input-group-text">2o apellido</span>
  <input type="text" id="sapellido" class="form-control" placeholder="2o apellido">
</div>
<div class="input-group mb-3">
<span class="input-group-text">Sexo</span>
<select id="sexo" class="form-select">
  <option selected>Escoger sexo</option>
  <option value="M">Mujer</option>
  <option value="H">Hombre</option>
</select>
</div>
<div class="input-group mb-3">
<span class="input-group-text">Fecha de nacimiento</span>
<input id="fechanacimiento" class="form-control" type="date" onchange="calcular_edad();">
</div>
<div class="input-group mb-3">
<span class="input-group-text">Edad del paciente:</span><span class="form-control" id="salida_edad"></span>
</div>
<div class="input-group mb-3">
  <span class="input-group-text">Documento de identidad</span>
<select class="form-select" id="tipodoc" style="max-width:8em">
  <option value="dni" selected>DNI</option>
  <option value="nie">NIE</option>
  <option value="passport">Pasaporte</option>
</select>

  <input type="text" id="documento" class="form-control" placeholder="Documento de identidad">
</div>
	</div>
	    <div class="col">


<div class="input-group mb-3">
  <span class="input-group-text">Direccion</span>
  <input type="text" id="direccion" class="form-control" placeholder="Dirección">
</div>
<div class="input-group mb-3">
  <span class="input-group-text">Localidad</span>
  <input type="text" id="localidad" class="form-control" placeholder="Localidad">
</div>
<div class="input-group mb-3">
  <span class="input-group-text">Provincia</span>
  <input type="text" id="provincia" class="form-control" placeholder="Provincia">
</div>
<div class="input-group mb-3">
  <span class="input-group-text">Código postal</span>
  <input type="text" id="cp" class="form-control" placeholder="CP">
</div>

<div class="input-group mb-3">
  <span class="input-group-text">Teléfono móvil</span>
  <input type="text" id="telefono1" class="form-control" placeholder="Teléfono móvil">
</div>
<div class="input-group mb-3">
  <span class="input-group-text">Teléfono fijo</span>
  <input type="text" id="telefono2" class="form-control" placeholder="Teléfono fijo">
</div>
<div class="input-group mb-3">
  <span class="input-group-text">Correo electrónico</span>
  <input type="text" id="email" class="form-control" placeholder="Correo electrónico">
</div>

</div>
</div>
</div>

<script>
function manejar_entrada() {
var url = 'busca.php';
var nombre = document.getElementById('nombre').value;
var papellido = document.getElementById('papellido').value;
var sapellido = document.getElementById('sapellido').value;
var sexo = document.getElementById('sexo').value;
var fechanac = document.getElementById('fechanacimiento').value;
var tipodoc = document.getElementById('tipodoc').value;
var documento = document.getElementById('documento').value;
var direccion = document.getElementById('direccion').value;
var localidad = document.getElementById('localidad').value;
var provincia = document.getElementById('provincia').value;
var cp = document.getElementById('cp').value;
var telefono1 = document.getElementById('telefono1').value;
var telefono2 = document.getElementById('telefono2').value;
var email = document.getElementById('email').value;


$.ajax({
        type: "POST",
        url: url,
data: {
		nombre: nombre,
		papellido: papellido,
		sapellido: sapellido,
		sexo: sexo,
		fechanac: fechanac,
		tipodoc: tipodoc,
		documento: documento,
		direccion: direccion,
		localidad: localidad,
		provincia: provincia,
		cp: cp,
		telefono1: telefono1,
		telefono2: telefono2,
		email: email,
		},
        success: function (data) {
		$("#SALIDA").html(data);
        }
        });
}

</script>
<script>
function manejar_entrada_asegur() {
var url2 = 'busca_asegur.php';
var aseguradora = document.getElementById('aseguradora').value;
var numtarjeta = document.getElementById('numtarjeta').value;
var auth = document.getElementById('auth').value;
var prestacion = document.getElementById('prestacion').value;
var pegatina = document.getElementById('pegatina').innerHTML;
var servicio = document.getElementById('servicio').value;
var cita = document.getElementById('cita').value;
var hora = document.getElementById('hora').value;
var medico = document.getElementById('medico').value;


$.ajax({
        type: "POST",
        url: url2,
data: {
	aseguradora: aseguradora,
	numtarjeta: numtarjeta,
	auth: auth,
	prestacion: prestacion,
	pegatina: pegatina,
	servicio: servicio,
	cita: cita,
	hora: hora,
	medico: medico,
        },
        success: function (data) {
                $("#SALIDA").html(data);
        }
        });
document.getElementById('botonintroducir').innerHTML = 'Imprimir cita';
document.getElementById('staticBackdropLabel').innerHTML = 'CITA';

}

</script>


<!-- Button trigger modal -->
<div style="text-align:center">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="manejar_entrada();">
Insertar paciente
</button>
<br><br>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Insertar paciente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="SALIDA" class="modal-body">
      </div>
      <div id="BOTONERA" class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button id="botonintroducir" type="button" class="btn btn-primary" onclick="manejar_entrada_asegur();">Introducir</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>
