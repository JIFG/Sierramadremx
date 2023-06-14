<?php 
include("../../bd.php");

if (isset($_GET['txtID'])) {
    $txtID = isset($_GET['txtID']) ? $_GET['txtID'] : "";
    $sentencia = $conexion->prepare("SELECT * FROM precios WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    $estados = $registro['precios'];
}

if ($_POST) {
    // Recepcionamos los valores del formulario
    $txtID = isset($_POST['txtID']) ? $_POST['txtID'] : "";
    $precios = (isset($_POST['precios'])) ? $_POST['precios'] : "";
    
      $sentencia=$conexion->prepare("UPDATE `precios` SET
      id=:id,
      precios=:precios WHERE id=:id ;");
  
      $sentencia->bindParam(":precios",$precios);
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
              <label for="precios" class="form-label">Precio:</label>
              <input value="<?php echo $estados; ?>"  type="text"
                class="form-control" name="precios" id="precios" aria-describedby="helpId" placeholder="Precios">
              
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>

    
</div>
<?php include("../../templates/footer.php");?>