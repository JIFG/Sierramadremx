<?php 
include("../../bd.php");

if (isset($_GET['txtID'])) {
    $txtID = isset($_GET['txtID']) ? $_GET['txtID'] : "";
    $sentencia = $conexion->prepare("SELECT * FROM lugares WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    $nombreconfiguracion = $registro['lugares'];
}

if ($_POST) {
    // Recepcionamos los valores del formulario
    $txtID = isset($_POST['txtID']) ? $_POST['txtID'] : "";
    $lugares = (isset($_POST['lugares'])) ? $_POST['lugares'] : "";
    
      $sentencia=$conexion->prepare("UPDATE `lugares` SET
      id=:id,
      lugares=:lugares WHERE id=:id ;");
  
      $sentencia->bindParam(":lugares",$lugares);
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
              <label for="lugares" class="form-label">Tipo de lugar:</label>
              <input value="<?php echo $nombreconfiguracion; ?>"  type="text"
                class="form-control" name="lugares" id="lugares" aria-describedby="helpId" placeholder="Nombre del lugar">
              
            </div>

            
            <button type="submit" class="btn btn-success">Actualizar</button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>

    
</div>
<?php include("../../templates/footer.php");?>