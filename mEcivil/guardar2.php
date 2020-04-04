<?php 
    //Conexion mysqli
    include'../conexion/conexionli.php';

    $descripcion    = trim($_POST['descripcion']);

    $activo = 1;

    $fecha= date("Y-m-d");
    $hora = date("H:i:s");
    
    $cadena = "INSERT INTO ecivil
                    (descripcion,
                    fecha_registro,
                    hora_registro,
                    activo)
                VALUES
                    ('$descripcion',
                    '$fecha',
                    '$hora',
                    $activo)";
    $insertar = mysqli_query($conexionLi, $cadena);
    //En caso de error imprime
    print_r(mysqli_error($conexionLi));
    //Cierro la conexion
    mysqli_close($conexionLi);
?>