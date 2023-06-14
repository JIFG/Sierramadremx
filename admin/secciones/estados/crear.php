<?php 
include("../../bd.php"); 

if ($_POST) {
  // Recepcionamos los valores del formulario
  $estados = (isset($_POST['estados'])) ? $_POST['estados'] : "";
  
    $sentencia=$conexion->prepare("INSERT INTO `estados` 
    (`ID`, `estados`) 
    VALUES (NULL, :estados);");

    $sentencia->bindParam(":estados",$estados);
    
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
              <label for="estados" class="form-label">Estado:</label>
              <input type="text"
                class="form-control" name="estados" id="estados" aria-describedby="helpId" placeholder="Nombre del estado">
              
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>

    
</div>

<?php include("../../templates/footer.php");?>