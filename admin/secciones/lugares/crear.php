<?php 
include("../../bd.php"); 

if ($_POST) {
  // Recepcionamos los valores del formulario
  $lugares = (isset($_POST['lugares'])) ? $_POST['lugares'] : "";
  
    $sentencia=$conexion->prepare("INSERT INTO `lugares` 
    (`ID`, `lugares`) 
    VALUES (NULL, :lugares);");

    $sentencia->bindParam(":lugares",$lugares);
    
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
              <label for="lugares" class="form-label">Tipo de Lugar:</label>
              <input type="text"
                class="form-control" name="lugares" id="lugares" aria-describedby="lugares" placeholder="Tipo de lugares">
              
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>

    
</div>

<?php include("../../templates/footer.php");?>