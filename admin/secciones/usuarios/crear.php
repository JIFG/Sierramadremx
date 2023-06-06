<?php 
include("../../bd.php");

if ($_POST) {
    print_r($usuario);
    // Recepcionamos los valores del formulario
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $correo = isset($_POST['correo']) ? $_POST['correo'] : "";
  
    // Verificamos si los campos obligatorios están vacíos
    if (empty($usuario) || empty($password) || empty($correo)) {
      echo '<script>alert("Por favor, complete todos los campos obligatorios.");</script>';
      // Puedes redirigir al usuario a otra página utilizando header() si lo deseas
      // header("Location: formulario.php");
    } else {
// Preparamos la sentencia SQL para la inserción
$sentencia = $conexion->prepare("INSERT INTO `tbl_usuarios` 
(`ID`, `usuario`, `password`, `correo`)
VALUES (NULL,:usuario,:password,:correo);");

// Asignamos los valores a los parámetros de la sentencia
$sentencia->bindParam(":usuario", $usuario);
$sentencia->bindParam(":password", $password);
$sentencia->bindParam(":correo", $correo);

// Ejecutamos la sentencia
if ($sentencia->execute()) {
  $mensaje="Registro agregado con exito";
  header("Location:index.php?mensaje=".$mensaje);
} else {
echo '<script>alert("Ocurrio un error en el registro.");</script>';
}
    }
  }
  
include("../../templates/header.php");
?>
<div class="card">
<form action="" enctype="multipart/form-data" method="post">
    <div class="card-header">
    </div>
    <div class="card-body">
        <div class="mb-3">
          <label for="" class="form-label">Nombre del usuario</label>
          <input type="text"
            class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Ingrese Usuario">
        </div>
    <div class="mb-3">
      <label for="" class="form-label">contraseña</label>
      <input type="password"
        class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Ingrese Contraseña">
    </div>
<div class="mb-3">
  <label for="" class="form-label">Correo</label>
  <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailHelpId" placeholder="Ingrese Correo">
  
</div>
<button type="submit" class="btn btn-success">Agregar</button>
<a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>



</div>
<?php include("../../templates/footer.php");?>