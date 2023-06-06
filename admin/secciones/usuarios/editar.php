<?php 

include("../../bd.php");

if(isset($_GET['txtID'])){
    //Recuperar los datos del ID correspondiente seleccionado
    $txtID=( isset($_GET['txtID']) )?$_GET['txtID']:"";

    $sentencia=$conexion->prepare(" SELECT * FROM tbl_usuarios WHERE id=:id ");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    $usuario=$registro['usuario'];
    $correo=$registro['correo'];
    $password=$registro['password'];
   
}

if($_POST){
    // Recepcionamos los valores del formulario
    $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "";
    $password = (isset($_POST['password'])) ? $_POST['password'] : "";
    $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "";

    $sentencia = $conexion->prepare("UPDATE tbl_usuarios
        SET 
        usuario=:usuario,
        correo=:correo,
        password=:password
        WHERE id=:id");

    $sentencia->bindParam(":password", $password);
    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->bindParam(":correo", $correo);
    $sentencia->bindParam(":id", $txtID);

    $sentencia->execute();
    $mensaje="Registro modificado con éxito";
    header("Location:index.php?mensaje=".$mensaje);
}

include("../../templates/header.php");?>

<div class="card">
<form action="" enctype="multipart/form-data" method="post">
    <div class="card-header">
    </div>
    <div class="card-body">

    <div class="mb-3">
      <label for="" class="form-label">ID</label>
      <input readonly type="text"
        class="form-control" value="<?php echo $txtID?>" name="txtID" id="txtID" aria-describedby="helpId" placeholder="">
    </div>
        <div class="mb-3">
          <label for="" class="form-label">Nombre del usuario</label>
          <input type="text"
            class="form-control" value="<?php echo $usuario?>"name="usuario" id="usuario" aria-describedby="helpId" placeholder="Ingrese Usuario">
        </div>
    <div class="mb-3">
      <label for="" class="form-label">contraseña</label>
      <input type="password"
        class="form-control" value="<?php echo $password?>"name="password" id="password" aria-describedby="helpId" placeholder="Ingrese Contraseña">
    </div>
<div class="mb-3">
  <label for="" class="form-label">Correo</label>
  <input type="email" class="form-control" value="<?php echo $correo?>"name="correo" id="correo" aria-describedby="emailHelpId" placeholder="Ingrese Correo">
  
</div>
<button type="submit" class="btn btn-success">Actualizar</button>
<a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
<?php include("../../templates/footer.php");?>