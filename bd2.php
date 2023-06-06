<?php

$servidor="localhost";
$bd="mapa";
$usuario="root";
$contraseña="";


try{
    $conexion=new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$contraseña);
}catch(Exception $error){
    echo $error->getMessage();
}






?>: