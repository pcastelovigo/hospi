<?php

$bdd = new mysqli("localhost","marga","alfredo","hospital");
if($bdd->connect_error) { die("Fallo de conexion con DB, zen:". $bdd->connect_error); }

//var_dump($_POST);
$sql = "UPDATE aseguradora SET nombre_aseguradora = '".$_POST['aseguradora']."', numero_tarjeta = '".$_POST['numtarjeta']."' WHERE numhistoria = ".$_POST['pegatina']."";
$query = $bdd->query($sql);


$sql = "INSERT INTO historias (numhistoria, num_autorizacion, prestacion, servicio, medico, fecha ) VALUES ('".$_POST['pegatina']."', '".$_POST['auth']."', '".$_POST['prestacion']."', '".$_POST['servicio']."', '".$_POST['medico']."', '".$_POST['cita']."')";
$query = $bdd->query($sql)


?>


<div>
<p>Historia clinica numero: <?php echo sprintf('%06d', $_POST['pegatina']); ?></p>
<p>Fecha de la cita: <?php echo $_POST['cita'];?></p>
<p>Hora: <?php echo $_POST['hora'];?></p>
<p>Servicio: <?php echo $_POST['servicio'];?></p>
<p>Facultativo: <?php echo $_POST['medico'];?></p>
<?php

$str = rand();
$result = md5($str);
echo "<p>Código cita: ".strtoupper(substr($result, 27))."</p>";

?>

</div>

