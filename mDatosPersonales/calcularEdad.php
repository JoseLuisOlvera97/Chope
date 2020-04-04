<?php
//funcion de uruario
include("../funciones/calcularEdad.php");
$fecha = $_POST['fecha'];
echo calculaEdad($fecha);
?>