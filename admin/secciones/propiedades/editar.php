<?php
include("../../bd.php");

if (isset($_GET['txtID'])) {
    $txtID = isset($_GET['txtID']) ? $_GET['txtID'] : "";
    $sentencia = $conexion->prepare("SELECT * FROM tbl_propiedades WHERE id=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);

    $titulo = $registro['titulo'];
    $descripcion = $registro['descripcion'];
    $precio = $registro['precio'];
    $img01 = $registro['IMG_01'];
    $img02 = $registro['IMG_02'];
    $img03 = $registro['IMG_03'];
    $img04 = $registro['IMG_04'];
    $img05 = $registro['IMG_05'];
    $ubicacion = $registro['ubicacion'];
    $longitud = $registro['longitud'];
    $latitud = $registro['latitud'];
    $tipo = $registro['tipo'];
    $localidad = $registro['localidad'];
    $servicio = $registro['servicio']; // Agregado

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $txtID = isset($_POST['txtID']) ? $_POST['txtID'] : "";
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : "";
    $precio = isset($_POST['precio']) ? $_POST['precio'] : "";
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "";
    $ubicacion = isset($_POST['ubicacion']) ? $_POST['ubicacion'] : "";
    $longitud = isset($_POST['longitud']) ? $_POST['longitud'] : "";
    $latitud = isset($_POST['latitud']) ? $_POST['latitud'] : "";
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
    $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : "";
    $servicio = (isset($_POST['servicio'])) ? $_POST['servicio'] : "";

    $sentencia = $conexion->prepare("UPDATE tbl_propiedades
        SET 
        titulo = :titulo,
        precio = :precio,
        tipo = :tipo,
        ubicacion = :ubicacion,
        latitud = :latitud,
        longitud = :longitud,
        descripcion = :descripcion,
        localidad = :localidad,
        servicio= :servicio
        WHERE id = :id");

    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":precio", $precio);
    $sentencia->bindParam(":tipo", $tipo);
    $sentencia->bindParam(":ubicacion", $ubicacion);
    $sentencia->bindParam(":latitud", $latitud);
    $sentencia->bindParam(":longitud", $longitud);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":localidad", $localidad);
    $sentencia->bindParam(":servicio",$servicio);
    $sentencia->bindParam(":id", $txtID);

    $sentencia->execute();

   // Verificar si se ha subido una nueva imagen y procesarla si es así
function procesarImagen($imgNombre, $imgFile) {
  global $conexion, $txtID;

  if ($imgFile["name"] != "") {
      $imgTmp = isset($imgFile['tmp_name']) ? $imgFile['tmp_name'] : "";

      $fechaImagen = new DateTime();
      $nombreArchivoImagen = ($imgTmp != "") ? $fechaImagen->getTimestamp() . "_" . $imgFile["name"] : "";

      $tmpImagen = $imgFile["tmp_name"];
      if ($tmpImagen != "") {
          move_uploaded_file($tmpImagen, "../../../images/casas/" . $nombreArchivoImagen);
      }

      // Obtener el nombre del archivo de imagen anterior
      $sentencia = $conexion->prepare("SELECT $imgNombre FROM tbl_propiedades WHERE id = :id");
      $sentencia->bindParam(":id", $txtID);
      $sentencia->execute();
      $registro = $sentencia->fetch(PDO::FETCH_ASSOC);
      $imagenAnterior = $registro[$imgNombre];

      // Eliminar imagen anterior solo si se ha subido una nueva imagen
      if (!empty($imagenAnterior) && file_exists("../../../images/casas/" . $imagenAnterior)) {
          unlink("../../../images/casas/" . $imagenAnterior);
      }

      // Actualizar la columna de imagen correspondiente en la base de datos
      $sentencia = $conexion->prepare("UPDATE tbl_propiedades
          SET $imgNombre = :imgNombre
          WHERE id = :id");
      $sentencia->bindParam(":imgNombre", $nombreArchivoImagen);
      $sentencia->bindParam(":id", $txtID);
      $sentencia->execute();
  }
}

    procesarImagen("img_01", $_FILES["img01"]);
    procesarImagen("img_02", $_FILES["img02"]);
    procesarImagen("img_03", $_FILES["img03"]);
    procesarImagen("img_04", $_FILES["img04"]);
    procesarImagen("img_05", $_FILES["img05"]);

    $mensaje = "Registro modificado con éxito";
    header("Location: index.php?mensaje=" . $mensaje);
}

// Repetir el proceso para las demás imágenes (img02, img03, img04, img05) si es necesario

include("../../templates/header.php");
?>


<div class="card">
    <div class="card-header">
        Editar Propiedad
    </div>
    <div class="card-body">

    <form action="" enctype="multipart/form-data" method="post">
    <div class="mb-3">
    <label for="txtID" class="form-label">ID:</label>
      <input readonly value="<?php echo $txtID;?>" type="text"
        class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="">
    </div>
    <div class="mb-3">
      <label for="titulo" class="form-label">Titulo:</label>
      <input type="text"
        class="form-control" value="<?php echo $titulo;?>" name="titulo" id="titulo" aria-describedby="helpId" placeholder="titulo">
    </div>

    <div class="mb-3">
      <label for="precio" class="form-label">Precio:</label>
      <input type="text"
        class="form-control" value="<?php echo $precio;?>"name="precio" id="precio" aria-describedby="helpId" placeholder="precio">
    </div>
    <div class="mb-3">
      <label for="tipo" class="form-label">tipo:</label>
      <input type="text"
        class="form-control" value="<?php echo $tipo;?>"name="tipo" id="tipo" aria-describedby="helpId" placeholder="precio">
    </div>
    <div class="mb-3">
      <label for="ubicacion" class="form-label">ubicacion:</label>
      <input type="text"
        class="form-control" value="<?php echo $ubicacion;?>" name="ubicacion" id="ubicacion" aria-describedby="helpId" placeholder="precio">
    </div>
    <div class="mb-3">
      <label for="ubicacion" class="form-label">latitud:</label>
      <input type="text"
        class="form-control" value="<?php echo $latitud;?>" name="latitud" id="latitud" aria-describedby="helpId" placeholder="latitud">
    </div>
    <div class="mb-3">
      <label for="ubicacion" class="form-label">longitud:</label>
      <input type="text"
        class="form-control" value="<?php echo $longitud;?>" name="longitud" id="longitud" aria-describedby="helpId" placeholder="longitud">
    </div>
    <div class="mb-3">
      <label for="img01" class="form-label">IMG_01:</label>
      <img width="50" src="../../../images/casas/<?php echo $img01;?>"/>
      <br>
      <input type="file" class="form-control" name="img01" id="img01" aria-describedby="helpId" placeholder="precio">
    </div>
    <div class="mb-3">
      <label for="img02" class="form-label">IMG_02:</label>
      <img width="50" src="../../../images/casas/<?php echo $img02;?>"/>
      <br><input type="file" class="form-control" name="img02" id="img02" aria-describedby="helpId" placeholder="precio">
    </div>
    <div class="mb-3">
      <label for="img03" class="form-label">IMG_03:</label>
      <img width="50" src="../../../images/casas/<?php echo $img03;?>"/>
      <br><input type="file"
        class="form-control" name="img03" id="img03" aria-describedby="helpId" placeholder="precio">
    </div>
    <div class="mb-3">
      <label for="img04" class="form-label">IMG_04:</label>
      <img width="50" src="../../../images/casas/<?php echo $img04;?>"/>
      <br><input type="file"
      class="form-control" name="img04" id="img04" aria-describedby="helpId" placeholder="precio">
    </div>
    <div class="mb-3">
      <label for="img05" class="form-label">IMG_05:</label>
      <img width="50" src="../../../images/casas/<?php echo $img05;?>"/>
      <br><input type="file"
      class="form-control" name="img05" id="img05" aria-describedby="helpId" placeholder="precio">
    </div>
    
    <div class="mb-3">
      <label for="descripcion" class="form-label">Descripción</label>
      <input type="text"
        class="form-control" value="<?php echo $descripcion;?> "name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripción">
    </div>
    <div class="mb-3">
      <label for="localidad" class="form-label">Localidad</label>
      <input type="text"
        class="form-control" value="<?php echo $localidad;?>" name="localidad" id="localidad" aria-describedby="helpId" placeholder="localidad">
    </div>
    <div class="mb-3">
      <label for="localidad" class="form-label">Servicio:</label>
      <input type="text"
        class="form-control"value="<?php echo $servicio;?>" name="servicio" id="servicio" aria-describedby="helpId" placeholder="servicio">
    </div>

    <button type="submit" class="btn btn-success">Actualizar</button>

    <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

    </form>





<?php include("../../templates/footer.php");?>