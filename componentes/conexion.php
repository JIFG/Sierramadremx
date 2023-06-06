<?php
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$bd ="sierramadre";

try {
    $conexion = new PDO("mysql:host=$servidor; dbname=$bd", $usuario, $contraseña);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Se agrega "IF NOT EXISTS" para evitar errores si la base de datos ya existe
    function create_unique_id(){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 20; $i++) {
            $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
  
} catch (PDOException $error) {
    echo "Error: " . $error->getMessage();
}
?>