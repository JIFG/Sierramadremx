<?php 
include("../../bd.php"); 

if ($_POST) {
  // Recepcionamos los valores del formulario
  $precios = (isset($_POST['precios'])) ? $_POST['precios'] : "";
  
    $sentencia=$conexion->prepare("INSERT INTO `precios` 
    (`ID`, `precios`) 
    VALUES (NULL, :precios);");

    $sentencia->bindParam(":precios",$precios);
    
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
              <label for="precios" class="form-label">Precio:</label>
              <input type="text"
                class="form-control" name="precios" id="precios" aria-describedby="helpId" placeholder="Precios">
              
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>

    
</div>

<?php include("../../templates/footer.php");?>