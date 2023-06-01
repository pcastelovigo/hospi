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
  <body onload="calcular_edad();">

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
          <a class="nav-link" aria-current="page" href="index.php">Gestión administrativa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="histo.php">Gestión clínica</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pruebas.php">Gestión pruebas</a>
        </li>
      </ul>
 <form class="d-flex" role="search" action="histo.php" method="get">
        <input class="form-control me-2" type="search" name="historia" placeholder="Número historia" aria-label="Buscar">
        <button class="btn btn-outline-success" type="submit" style="white-space:nowrap">Buscar historia</button>
      </form>
    </div>
  </div>
</nav>

<?php
$bdd = new mysqli("localhost","marga","alfredo","hospital");
if($bdd->connect_error) { die("Fallo de conexion con DB, zen:". $bdd->connect_error); }

//aqui
if (isset($_GET['historia'])){

$sql = "SELECT * from aseguradora where numhistoria = ".$_GET['historia']."";
$query = $bdd->query($sql);
while($salida = $query->fetch_assoc()){
$numhistoria = $salida['numhistoria'];
$documento = $salida['documento'];
}

$sql = "SELECT * from pacientes WHERE documento = '".$documento."'";
$query = $bdd->query($sql);

while($salida = $query->fetch_assoc()){
$nombre = $salida['nombre'];
$papellido = $salida['1apellido'];
$sapellido = $salida['2apellido'];
$sexo = $salida['sexo'];
$fechanac = $salida['fechanac'];
}

$sql = "SELECT * from historias where numhistoria = ".$_GET['historia']." AND historia IS NULL";
$query = $bdd->query($sql);
while($salida = $query->fetch_assoc()){
$medico = $salida['medico'];
$servicio = $salida['servicio'];
$codigo = $salida['codigo'];
}

//aca
}

?>

<div class="container">
	<div class="row align-items-start">
		<div class="col">
			<div class="input-group mb-3">
			 <span class="input-group-text">Número de historia clínica:</span>
			 <input type="text" id="numhistoria" class="form-control" value="<?php echo sprintf('%06d', $numhistoria); ?>" readonly>
			</div>
		</div>
		<div class="col">
			<div class="input-group mb-3">
			 <span class="input-group-text">Identificador consulta:</span>
			 <input type="text" id="codigo" class="form-control" value="<?php echo sprintf('%06d', $codigo); ?>" readonly>
			</div>
		</div>
	</div>

</div>

<div class="container">
	<div class="row align-items-start">
		<div class="col">
			<div class="input-group mb-3">
			 <span class="input-group-text">Nombre</span>
			 <input type="text" id="nombre" class="form-control" value="<?php echo $nombre; ?>" readonly>
			</div>
			<div class="input-group mb-3">
			 <span class="input-group-text">1er apellido</span>
 			 <input id="papellido" type="text" class="form-control" value="<?php echo $papellido; ?>" readonly>
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text">2o apellido</span>
			  <input type="text" id="sapellido" class="form-control" value="<?php echo $sapellido; ?>" readonly>
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text">Servicio</span>
			  <input type="text" id="servicio" class="form-control" value="<?php echo $servicio; ?>" readonly>
			</div>
			
		</div>
		<div class="col">
			<div class="input-group mb-3">
			<span class="input-group-text">Sexo</span>
			  <input type="text" id="sexo" class="form-control" value="<?php if ($sexo == "M") {echo "Mujer";} else { echo "Hombre";} ?>" readonly>
			</div>
			<div class="input-group mb-3">
			<span class="input-group-text">Fecha de nacimiento</span>
			<input id="fechanacimiento" class="form-control" type="text" value="<?php echo $fechanac; ?>" readonly>
			</div>
			<div class="input-group mb-3">
			<span class="input-group-text">Edad del paciente:</span><span class="form-control" id="salida_edad"></span>
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text">Facultativo</span>
			  <input type="text" id="medico" class="form-control" value="<?php echo $medico; ?>" readonly>
			</div>

		</div>
	</div>
</div>


<div class="container">
<?php
$sql = "SELECT * from historias where numhistoria = ".$_GET['historia']." AND historia IS NOT NULL ORDER BY fecha ASC";
$query = $bdd->query($sql);

if ($query->num_rows > 0) {
echo "<div class=\"accordion accordion-flush\" id=\"accordionFlushExample\">";
}

$contador = 1;
while($salida = $query->fetch_assoc()){

echo "<div class=\"accordion-item\">";
echo "<h2 class=\"accordion-header\" id=\"flushheading".$contador."\">";
echo "<button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#flushcollapse".$contador."\">".$salida['fecha']." - Código consulta: ".$salida['codigo']." - ".$salida['servicio']." - ".$salida['medico']."</button>";
echo "</h2>";
echo "<div id=\"flushcollapse".$contador."\" class=\"accordion-collapse collapse\" data-bs-parent=\"#accordionFlushExample\">";
echo "<div class=\"accordion-body\">";
echo "<p><strong>Historia: </strong>".$salida['historia']."</p>";
echo "<p><strong>Peticiones: </strong>".$salida['peticiones']."</p>";
echo "<p><strong>Prescripciones: </strong>".$salida['prescripciones']."</p>";
echo "<p><strong>Informes exploraciones complementarias: </strong>".$salida['informes']."</p>";
if ($salida['imagen'] != Null) {echo "<img src=\"uploads/".$salida['imagen']."\"<img>";}
echo "<p><strong>Informe de quirófano: </strong>".$salida['infoquirofano']."</p>";
echo "<p><strong>Enfermería: </strong>".$salida['enfermeria']."</p>";
echo "<p><strong>Informe de urgencia: </strong>".$salida['urgencia']."</p>";
echo "<p><strong>Documentación médico legal: </strong>".$salida['documentacion']."</p>";
if ($salida['imagen3'] != Null) {echo "<img src=\"uploads/".$salida['imagen3']."\"<img>";}
echo "<p><strong>Otra documentacion: </strong>".$salida['otradocumentacion']."</p>";
if ($salida['imagen2'] != Null) {echo "<img src=\"uploads/".$salida['imagen2']."\"<img>";}
echo "<p><strong>Hoja clínico estadística: </strong>".$salida['hoja']."</p>";

echo "</div></div></div>";
$contador = $contador + 1;
}
if ($query->num_rows > 0) {
echo "<div>";
}
?>

</div>



<div class="container" style="margin-top:3em">

<div class="mb-3">
  <span class="input-group-text">Historia</span>
  <textarea class="form-control" id="historia" rows="4"></textarea>
</div>
<div class="mb-3">
  <span class="input-group-text">Peticiones</span>
  <textarea class="form-control" id="peticiones" rows="4"></textarea>
</div>
<div class="mb-3">
  <span class="input-group-text">Prescripciones</span>
  <textarea class="form-control" id="prescripciones" rows="4"></textarea>
</div>
<div class="mb-3">
  <span class="input-group-text">Informes exploraciones complementarias</span>
  <textarea class="form-control" id="informes" rows="4"></textarea>
</div>
<div class="mb-3">
  <span class="input-group-text">Informe de quirófano</span>
  <textarea class="form-control" id="infoquirofano" rows="4"></textarea>
</div>
<div class="mb-3">
  <span class="input-group-text">Enfermería</span>
  <textarea class="form-control" id="enfermeria" rows="4"></textarea>
</div>
<div class="mb-3">
  <span class="input-group-text">Informe de urgencia</span>
  <textarea class="form-control" id="urgencia" rows="4"></textarea>
</div>
<div class="mb-3">
  <span class="input-group-text">Documentación médico legal</span>
  <textarea class="form-control" id="documentacion" rows="4"></textarea>
</div>
<div class="mb-3">
  <span class="input-group-text">Otra documentación</span>
  <textarea class="form-control" id="otradocumentacion" rows="4"></textarea>
</div>
<div class="mb-3">
  <span class="input-group-text">Hoja clínico estadística</span>
  <textarea class="form-control" id="hoja" rows="4"></textarea>
</div>


<script>
function manejar_entrada() {
var url = 'guardar.php';
var historia = document.getElementById('historia').value;
var peticiones = document.getElementById('peticiones').value;
var prescripciones = document.getElementById('prescripciones').value;
var informes = document.getElementById('informes').value;
var infoquirofano = document.getElementById('infoquirofano').value;
var enfermeria = document.getElementById('enfermeria').value;
var urgencia = document.getElementById('urgencia').value;
var documentacion = document.getElementById('documentacion').value;
var otradocumentacion = document.getElementById('otradocumentacion').value;
var hoja = document.getElementById('hoja').value;
var numhistoria = <?php echo $_GET['historia']; ?>;

$.ajax({
        type: "POST",
        url: url,
data: {
                historia: historia,
		peticiones: peticiones,
		prescripciones: prescripciones,
		informes: informes,
		infoquirofano: infoquirofano,
		enfermeria: enfermeria,
		urgencia: urgencia,
		documentacion: documentacion,
		otradocumentacion: otradocumentacion,
		hoja: hoja,
		numhistoria : numhistoria,
                },
        success: function (data) {
                $("#SALIDA").html(data);
        }
        });
}

</script>




</div>
<div style="text-align:center">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="manejar_entrada();">
Guardar datos paciente
</button>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Insertar Historia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="$('input').val('');"></button>
      </div>
      <div id="SALIDA" class="modal-body">
      </div>
      <div id="BOTONERA" class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="$('input').val('');$('textarea').val('')">Cerrar</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>
