<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizacion</title>
</head>
<body>
    <h1>Actualizacion</h1>
    <?php
        $oldCode=$_POST["txtOldCode"];
        $code=$_POST["txtCode"];
        $name=$_POST["txtName"];
        $age=$_POST["txtAge"];
        $city=$_POST["txtCity"];
        $valName=false;
        $valCode=false;
        $valAge=false;
        $valCity=false;
        $valOldCode=false;
        if(preg_match("/^I[0-9]{6}$/",$code)) $valCode=true;
        if(preg_match("/^I[0-9]{6}$/",$oldCode)) $valOldCode=true;
        if(preg_match("/^[a-zA-Z\ñ\Ñ ]{3,20}$/",$name)) $valName=true;
        if(intval($age)>10 && intval($age)<80) $valAge=true;
        if(preg_match("/^[a-zA-Z\ñ\Ñ ]{3,20}$/",$city)) $valCity=true;
        if($valName && $valCode && $valAge && $valCity && $valOldCode){
            include "conexion.php";
            if($con){
                $sql="update estudiantes set codigo='".$code."', nombre='".$name."', edad='".$age."', ciudad='".$city."' where codigo='".$oldCode."'";
                if($connection->query($sql)){
                    echo "<p>La actualizacion fue exitosa</p>";
                }
                else{
                    echo "<p>La actualizacion fallo</p>";
                }
                echo "<a href='modificacion.php'>volver</a>";
                $connecion->close();
            }
        }
    ?>
</body>
</html>