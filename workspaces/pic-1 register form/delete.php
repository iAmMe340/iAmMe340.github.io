<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
</head>
<body>
    <h1>Eliminar usuarios</h1>
    <?php
        $code=$_POST["id"];
        if(preg_match("/^I[0-9]{6}$/",$code)){
            include "conexion.php";
            if($con){
                $sql="delete from estudiantes where codigo='".$code."'";
                if($connection->query($sql)){
                    echo "<p>Eliminacion exitosa</p>";
                }
                else{
                    echo "<p>Fallo la eliminacion</p>";
                }
                echo "<a href='eliminar.php'>volver</a>";
                $connection->close();
            }
        }
        else{
            echo "<p>El codigo enviado no es valido <a href='eliminar.php'>volver</a></p>";
        }
    ?>
</body>
</html>