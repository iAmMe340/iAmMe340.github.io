<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
</head>
<body>
    <?php
        $code=$_POST["txtCode"];
        $name=$_POST["txtName"];
        $age=$_POST["txtAge"];
        $city=$_POST["txtCity"];
        $valName=false;
        $valCode=false;
        $valAge=false;
        $valCity=false;
        if(preg_match("/^I[0-9]{6}$/",$code)) $valCode=true;
        if(preg_match("/^[a-zA-Z\ñ\Ñ ]{3,20}$/",$name)) $valName=true;
        if(intval($age)>10 && intval($age)<80) $valAge=true;
        if(preg_match("/^[a-zA-Z\ñ\Ñ ]{3,20}$/",$city)) $valCity=true;
        if($valName && $valCode && $valAge && $valCity){
            include "conexion.php";
            if($con){
                $sql="insert into estudiantes value('".$code."','".$name."',".$age.",'".$city."')";
                if($connection->query($sql)){
                    echo "Registro fue exitoso<br>";
                }
                else{
                    echo "Registro fallo<br>";
                }
                echo "<a href='index.html'>volver</a>";
            }
        }
        else{
            echo "Los datos enviados no son validos";
        }
    ?>
</body>
</html>