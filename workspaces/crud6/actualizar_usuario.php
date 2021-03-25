<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
</head>
<body>
    <h1>Actualizar usuario</h1>
    <form action="update.php" method="post">
        <?php
            $code=$_POST["id"];
            if(preg_match("/^I[0-9]{6}$/",$code)){
                include "conexion.php";
                if($con){
                    $sql="select * from estudiantes where codigo='".$code."'";
                    if($resultado=$connection->query($sql)){
                        while($row=$resultado->fetch_assoc()){
                            echo "<input type='text' name='txtOldCode' id='txtOldCode' value='".$row["codigo"]."' hidden=''><br>";
                            echo "<P>Codigo: </P><input type='text' name='txtCode' id='txtCode' value='".$row["codigo"]."'><br>";
                            echo "<p>Nombre: </p><input type='text' name='txtName' id='txtName' value='".$row["nombre"]."'><br>";
                            echo "<p>Edad: </p><input type='number' name='txtAge' id='txtAge' value='".$row["edad"]."'><br>";
                            echo "<p>Ciudad: </p><input type='text' name='txtCity' id='txtCity' value='".$row["ciudad"]."'><br>";
                        }
                        echo "<input type='submit' value='Actualizar'>";
                    }
                    $connection->close();
                }
            }
            else{
                echo "<p>El codigo enviado no es valido <a href='modificacion.php'>volver</a></p>";
            }
        ?>
    </form>
</body>
</html>