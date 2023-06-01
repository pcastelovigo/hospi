<?php
$bdd = new mysqli("localhost","marga","alfredo","hospital");
if($bdd->connect_error) { die("Fallo de conexion con DB, zen:". $bdd->connect_error); }
$sql = "UPDATE historias SET informes = '".$_POST['informes']."', infoquirofano = '".$_POST['infoquirofano']."', enfermeria = '".$_POST['enfermeria']."', urgencia = '".$_POST['urgencia']."', documentacion = '".$_POST['documentacion']."', otradocumentacion = '".$_POST['otradocumentacion']."', hoja = '".$_POST['hoja']."' WHERE codigo = ".$_POST['codigo']."";
$query = $bdd->query($sql);
?>
<div class="container">
Datos introducidos correctamente
</div>
