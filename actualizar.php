<?php

    include_once 'conexion.php';


    if(isset($_GET['id']))
    {
        $id=$_GET['id'];

        $sql="select * from contacto where id_contacto='$id'";

        $resultado=mysqli_query($con,$sql);

        if($fila=mysqli_fetch_assoc($resultado))
        {
            //mostrar valores en las cajas de texto
        }
    }

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $direccion=$_POST['direccion'];
        $email=$_POST['email'];
        $tel=$_POST['tel'];
        $cel=$_POST['cel'];
        $whatsapp=$_POST['whatsapp'];

        $sql="update contacto set nombre_suc='$nombre', direccion='$direccion', email='$email', tel='$tel', cel='$cel', whatsapp='$whatsapp' where id_contacto='$id'";


        $resultado=mysqli_query($con,$sql);


       if ($resultado)
       {
          echo "<script>
                  alert('¡Contacto Actualizado con éxito!');
                  location.href='administrar.php';
                </script>";
       }
       else
       {
          echo "<script>
                    alert('No fue posible actualizar correctamente, intentelo de nuevo ...');
                    location.href='administrar.php';
                </script>";
       }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Contacto</title>
</head>
<body>
    <br>
    <h3><a href="administrar.php">Contactos -> Administrar</a></h3>
    <h1>Actualizar Contactos</h1>
    <hr>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for="nombrelbl">Nombre: </label>
            <input type="text" name="nombre" id="nombrelbl" value="<?php echo $fila[nombre_suc]?>" required>
            <label for="direccionlbl">Dirección: </label>
            <input type="text" name="direccion" id="direccionlbl" value="<?php echo $fila[direccion]?>" required>
            <label for="emaillbl">Email: </label>
            <input type="text" name="email" id="emaillbl" value="<?php echo $fila[email]?>" required>
            <label for="tellbl">Telefono: </label>
            <input type="tel" name="tel" id="tellbl" value="<?php echo $fila[tel]?>" required>
            <label for="">Celular: </label>
            <input type="tel" name="cel" id="cellbl" value="<?php echo $fila[cel]?>" required>
            <label for="wpplbl">Whatsapp: </label>
            <input type="tel" name="wpp" id="wpplbl" value="<?php echo $fila[whatsapp]?>" required>
            <input type="submit" name="guardar" value="Guardar">
            <input type="hidden" name="id" value="<?php echo $fila[id_contacto]?>">
    </form>
    <hr>
</body>
</html>