<?php
    $con=true;
    $address="localhost";
    $username="root";
    $password="";
    $database="programacion";
    $connection=new mysqli($address,$username,$password,$database);
    if($connection->connect_errno){
        echo "Fallo conexion: ".$connection->connect_errno;
        $con=false;
    }
?>