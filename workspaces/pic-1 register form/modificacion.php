<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
</head>
<body>
    <h1>Usuarios</h1>
    <form action="actualizar_usuario.php" method="POST">
        <table>
            <?php
                include "conexion.php";
                if($con){
                    $sql="select * from estudiantes";
                    if($resultado=$connection->query($sql)){
                        while($row=$resultado->fetch_assoc()){
                            echo "<tr>";
                            echo "<td><input type='radio' name='id' value='".$row["codigo"]."'></td>";
                            echo "<td><p>".$row["codigo"]."</p></td>";
                            echo "<td><p>".$row["nombre"]."</p></td>";
                            echo "</tr>";
                        }
                    }
                    $connection->close();
                }
            ?>
        </table>
        <input type="submit" value="Modificar">
    </form>
</body>
</html>