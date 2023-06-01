<?php
$bdd = new mysqli("localhost","marga","alfredo","hospital");
if($bdd->connect_error) { die("Fallo de conexion con DB, zen:". $bdd->connect_error); }
$sql = "UPDATE historias SET historia = '".$_POST['historia']."', peticiones = '".$_POST['peticiones']."', prescripciones = '".$_POST['prescripciones']."', informes = '".$_POST['informes']."', infoquirofano = '".$_POST['infoquirofano']."', enfermeria = '".$_POST['enfermeria']."', urgencia = '".$_POST['urgencia']."', documentacion = '".$_POST['documentacion']."', otradocumentacion = '".$_POST['otradocumentacion']."', hoja = '".$_POST['hoja']."' WHERE numhistoria = ".$_POST['numhistoria']." AND historia IS NULL";
$query = $bdd->query($sql);
?>
<div class="container">
Historia introducida correctamente
</div>
