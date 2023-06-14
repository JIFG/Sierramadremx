<?php 
include("../../bd.php");

if (isset($_GET['txtID'])) {
    $txtID = isset($_GET['txtID']) ? $_GET['txtID'] : "";
    $sentencia = $conexion->prepare("SELECT * FROM servicio WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    $servicio = $registro['servicio'];
}

if ($_POST) {
    // Recepcionamos los valores del formulario
    $txtID = isset($_POST['txtID']) ? $_POST['txtID'] : "";
    $servicio = (isset($_POST['servicio'])) ? $_POST['servicio'] : "";
    
      $sentencia=$conexion->prepare("UPDATE `servicio` SET
      id=:id,
      servicio=:servicio WHERE id=:id ;");
  
      $sentencia->bindParam(":servicio",$servicio);
      $sentencia->bindParam(":id",$txtID);
      
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
            <label for="txtID" class="form-label">ID:</label>
            <input value="<?php echo $txtID; ?>" type="text"
                class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
            
            </div>
          
            <div class="mb-3">
              <label for="servicio" class="form-label">Servicio:</label>
              <input value="<?php echo $servicio; ?>"  type="text"
                class="form-control" name="servicio" id="servicio" aria-describedby="helpId" placeholder="Nombre del servicio">
              
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>

    
</div>
<?php include("../../templates/footer.php");?>