<?php
    include_once('conexion.php');

    $sql="select * from contacto";

    $resultado=mysqli_query($con, $sql);

    $num_filas = mysqli_num_rows($resultado);

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Contactos</title>
</head>
<body>
    <br>
    <center>
        <h1>Administrar Contactos</h1>
        <hr>
        <table>
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>E-mail</th>
                <th>Teléfono</th>
                <th>Celular</th>
                <th>Whatsapp</th>
                <th>Acciones</th>
            </thead>
            <?php
            while ($fila=mysqli_fetch_assoc($resultado))
            {
            ?>

            <tbody>
                <td><?php echo $fila['id_contacto'] ?></td>
                <td><?php echo $fila['nombre_suc'] ?></td>
                <td><?php echo $fila['direccion'] ?></td>
                <td><?php echo $fila['email'] ?></td>
                <td><?php echo $fila['tel'] ?></td>
                <td><?php echo $fila['cel'] ?></td>
                <td><?php echo $fila['whatsapp'] ?></td>
                <td><a href="actualizar.php?id=<?php $fila['id_contacto']?>">Actualizar</a></td>
            </tbody>
        </table>
        <hr>
        <h2>Número de Registros: <?php echo $num_filas ?></h2>
    </center>
    <?php
            }
    ?>
</body>
</html>