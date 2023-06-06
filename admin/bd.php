<?php

$servidor="localhost";
$bd="sierramadreadmin";
$usuario="root";
$contraseña="";


try{
    $conexion=new PDO("mysql:host=$servidor;dbname=$bd",$usuario,$contraseña);
}catch(Exception $error){
    echo $error->getMessage();
}






?>: