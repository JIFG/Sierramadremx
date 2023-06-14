<?php 
include("../../bd.php"); 

if ($_POST) {
  // Recepcionamos los valores del formulario
  $servicio = (isset($_POST['servicio'])) ? $_POST['servicio'] : "";
  
    $sentencia=$conexion->prepare("INSERT INTO `servicio` 
    (`ID`, `servicio`) 
    VALUES (NULL, :servicio);");

    $sentencia->bindParam(":servicio",$servicio);
    
    $sentencia->execute();

    $mensaje="Registro agregado con éxito";
  header("Location:index.php?mensaje=".$mensaje);

}

include("../../templates/header.php");?>

<div class="card">

    <div class="card-header"> 
        Configuración
    </div>

    <div class="card-body">
        <form action="" method="post">
          
            <div class="mb-3">
              <label for="servicio" class="form-label">Servicio:</label>
              <input type="text"
                class="form-control" name="servicio" id="servicio" aria-describedby="helpId" placeholder="Nombre del servicio">
              
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>

    
</div>

<?php include("../../templates/footer.php");?>