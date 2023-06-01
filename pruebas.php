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
          <a class="nav-link" aria-current="page" href="index.php">Gestión administrativa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="histo.php">Gestión clínica</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="pruebas.php">Gestión pruebas</a>
        </li>
      </ul>
 <form class="d-flex" role="search" action="pruebas.php" method="get">
        <input class="form-control me-2" type="search" name="codigo" placeholder="Identificar consulta" aria-label="Buscar">
        <button class="btn btn-outline-success" type="submit" style="white-space:nowrap">Buscar historia</button>
      </form>
    </div>
  </div>
</nav>

<div class="container" style="margin-top:3em">

                        <div class="input-group mb-3">
                         <span class="input-group-text">Identificador consulta:</span>
                         <input type="text" id="codigo" class="form-control" value="<?php echo sprintf('%06d', $_GET['codigo']); ?>" readonly>
                        </div>


<div class="mb-3">
  <span class="input-group-text">Informes exploraciones complementarias</span>
  <textarea class="form-control" id="informes" rows="4"></textarea>
</div>
<form action="upload.php?informe=complementario" method="post" enctype="multipart/form-data">
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="hidden" name="consulta" value="<?php echo $_GET['codigo']; ?>">
  <input type="submit" value="Adjuntar imagen" name="submit">
</form>
<br>
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
<form action="upload.php?informe=medicolegal" method="post" enctype="multipart/form-data">
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="hidden" name="consulta" value="<?php echo $_GET['codigo']; ?>">
  <input type="submit" value="Adjuntar imagen" name="submit">
</form>
<br>
<div class="mb-3">
  <span class="input-group-text">Otra documentación</span>
  <textarea class="form-control" id="otradocumentacion" rows="4"></textarea>
</div>
<form action="upload.php?informe=otradoc" method="post" enctype="multipart/form-data">
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="hidden" name="consulta" value="<?php echo $_GET['codigo']; ?>">
  <input type="submit" value="Adjuntar imagen" name="submit">
</form>
<br>
<div class="mb-3">
  <span class="input-group-text">Hoja clínico estadística</span>
  <textarea class="form-control" id="hoja" rows="4"></textarea>
</div>



<script>
function manejar_entrada() {
var url = 'guardar_pruebas.php';
let today = new Date().toISOString().slice(0, 10);
var informes = document.getElementById('informes').value;
var infoquirofano = document.getElementById('infoquirofano').value;
var enfermeria = document.getElementById('enfermeria').value;
var urgencia = document.getElementById('urgencia').value;
var documentacion = document.getElementById('documentacion').value;
var otradocumentacion = document.getElementById('otradocumentacion').value;
var hoja = document.getElementById('hoja').value;
var codigo = <?php echo $_GET['codigo']; ?>;

$.ajax({
        type: "POST",
        url: url,
data: {
                informes: informes,
                infoquirofano: infoquirofano,
                enfermeria: enfermeria,
                urgencia: urgencia,
                documentacion: documentacion,
                otradocumentacion: otradocumentacion,
                hoja: hoja,
		codigo: codigo,
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
Guardar datos pruebas
</button>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Insertar pruebas</h5>
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
