<?php include("../../bd.php");


if ($_POST) {
  // Recepcionamos los valores del formulario
  $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
  $precio = (isset($_POST['precio'])) ? $_POST['precio'] : "";
  $tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : "";
  $ubicacion = (isset($_POST['ubicacion'])) ? $_POST['ubicacion'] : "";
  $longitud = (isset($_POST['longitud'])) ? $_POST['longitud'] : "";
  $latitud= (isset($_POST['latitud'])) ? $_POST['latitud'] : "";
  $img_01 = (isset($_FILES['img01']['name'])) ? $_FILES['img01']['name'] : "";
  $img_02 = (isset($_FILES['img02']['name'])) ? $_FILES['img02']['name'] : "";
  $img_03 = (isset($_FILES['img03']['name'])) ? $_FILES['img03']['name'] : "";
  $img_04 = (isset($_FILES['img04']['name'])) ? $_FILES['img04']['name'] : "";
  $img_05 = (isset($_FILES['img05']['name'])) ? $_FILES['img05']['name'] : "";
  $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";
  $localidad = (isset($_POST['localidad'])) ? $_POST['localidad'] : "";
  $servicio = (isset($_POST['servicio'])) ? $_POST['servicio'] : "";

  $fecha_imagen = new DateTime();
  $nombre_archivo_imagen1 = ($img_01 != "")? $fecha_imagen->getTimestamp()."_".$img_01:"";
  $nombre_archivo_imagen2 = ($img_02 != "")? $fecha_imagen->getTimestamp()."_".$img_02:"";
  $nombre_archivo_imagen3 = ($img_03 != "")? $fecha_imagen->getTimestamp()."_".$img_03:"";
  $nombre_archivo_imagen4 = ($img_04 != "")? $fecha_imagen->getTimestamp()."_".$img_04:"";
  $nombre_archivo_imagen5 = ($img_05 != "")? $fecha_imagen->getTimestamp()."_".$img_05:"";

  $tmp_imagen = $_FILES["img01"]["tmp_name"];
  if ($tmp_imagen != "") {
    move_uploaded_file($tmp_imagen, "../../../images/casas/".$nombre_archivo_imagen1);
  }
  $tmp_imagen2 = $_FILES["img02"]["tmp_name"];
  if ($tmp_imagen2 != "") {
    move_uploaded_file($tmp_imagen2, "../../../images/casas/".$nombre_archivo_imagen2);
  }
  $tmp_imagen3 = $_FILES["img03"]["tmp_name"];
  if ($tmp_imagen3 != "") {
    move_uploaded_file($tmp_imagen3, "../../../images/casas/".$nombre_archivo_imagen3);
  }
  $tmp_imagen4 = $_FILES["img04"]["tmp_name"];
  if ($tmp_imagen4 != "") {
    move_uploaded_file($tmp_imagen4, "../../../images/casas/".$nombre_archivo_imagen4);
  }
  $tmp_imagen5 = $_FILES["img05"]["tmp_name"];
  if ($tmp_imagen5 != "") {
    move_uploaded_file($tmp_imagen5, "../../../images/casas/".$nombre_archivo_imagen5);
  }

  







    $sentencia=$conexion->prepare("INSERT INTO `tbl_propiedades` 
    (`ID`, `titulo`, `precio`, `tipo`, `ubicacion`, `IMG_01`, `IMG_02`, `IMG_03`, `IMG_04`, `IMG_05`, `descripcion`, `localidad`, `servicio`) 
    VALUES (NULL, :titulo, :precio, :tipo, :ubicacion, latitud, longitud :img_01, :img_02, :img_03, :img_04, :img_05, :descripcion, :localidad, :servicio);");

    $sentencia->bindParam(":titulo",$titulo);
    $sentencia->bindParam(":precio",$precio);
    $sentencia->bindParam(":tipo",$tipo);
    $sentencia->bindParam(":ubicacion",$ubicacion);
    $sentencia->bindParam(":img_01",$nombre_archivo_imagen1);
    $sentencia->bindParam(":img_02",$nombre_archivo_imagen2);
    $sentencia->bindParam(":img_03",$nombre_archivo_imagen3);
    $sentencia->bindParam(":img_04",$nombre_archivo_imagen4);
    $sentencia->bindParam(":img_05",$nombre_archivo_imagen5);
    $sentencia->bindParam(":descripcion",$descripcion);
    $sentencia->bindParam(":localidad",$localidad);
    $sentencia->bindParam(":servicio",$servicio);
    $sentencia->bindParam(":latitud",$latitud);
    $sentencia->bindParam(":longitud",$longitud);
    
    $sentencia->execute();
    $mensaje="Registro agregado con exito";
  header("Location:index.php?mensaje=".$mensaje);

}

$sentencia=$conexion->prepare("SELECT * FROM `precios`");
$sentencia->execute();
$precios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia=$conexion->prepare("SELECT * FROM `lugares`");
$sentencia->execute();
$lugares=$sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia=$conexion->prepare("SELECT * FROM `estados`");
$sentencia->execute();
$estados=$sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia=$conexion->prepare("SELECT * FROM `servicio`");
$sentencia->execute();
$servicio=$sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");




?>
<div class="card">
    <div class="card-header">
        Agregar Propiedad
    </div>
    <div class="card-body">

    <form action="" enctype="multipart/form-data" method="post">

    <div class="mb-3">
      <label for="titulo" class="form-label">Titulo:</label>
      <input type="text"
        class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="titulo">
    </div>

    <div class="mb-3">
      <label for="precio" class="form-label">Precio:</label>
      <input type="text"
        class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="precio">
    </div>
    
    <div class="mb-3">
    <label for="tipo" class="form-label">Tipo de servicio:</label>
      <select name="tipo" class="input" required>
                  <?php foreach($lugares as $registros){ ?>
                     <option value="<?php echo $registros['lugares'];?>"><?php echo $registros['lugares'];?></option>
                     <?php } ?>
                     
      </select>

    </div>
    
    <div class="mb-3">
      <label for="tipo" class="form-label">tipo:</label>
      <input type="text"
        class="form-control" name="tipo" id="tipo" aria-describedby="helpId" placeholder="tipo">
    </div>
    <div class="mb-3">
      <label for="ubicacion" class="form-label">ubicacion:</label>
      <input type="text"
        class="form-control" name="ubicacion" id="ubicacion" aria-describedby="helpId" placeholder="ubicacion">
    </div>
    <div class="mb-3">
      <label for="latitud" class="form-label">latitud:</label>
      <input type="text"
        class="form-control" name="latitud" id="latitud" aria-describedby="helpId" placeholder="latitud">
    </div>
    <div class="mb-3">
      <label for="longitud" class="form-label">longitud:</label>
      <input type="text"
        class="form-control" name="longitud" id="longitud" aria-describedby="helpId" placeholder="longitud">
    </div>
    <div class="mb-3">
      <label for="img01" class="form-label">IMG_01:</label>
      <input type="file"
        class="form-control" name="img01" id="img01" aria-describedby="helpId" placeholder="precio">
    </div>
    <div class="mb-3">
      <label for="img02" class="form-label">IMG_02:</label>
      <input type="file"
        class="form-control" name="img02" id="img02" aria-describedby="helpId" placeholder="precio">
    </div>
    <div class="mb-3">
      <label for="img03" class="form-label">IMG_03:</label>
      <input type="file"
        class="form-control" name="img03" id="img03" aria-describedby="helpId" placeholder="precio">
    </div>
    <div class="mb-3">
      <label for="img04" class="form-label">IMG_04:</label>
      <input type="file"
        class="form-control" name="img04" id="img04" aria-describedby="helpId" placeholder="precio">
    </div>
    <div class="mb-3">
      <label for="img05" class="form-label">IMG_05:</label>
      <input type="file"
        class="form-control" name="img05" id="img05" aria-describedby="helpId" placeholder="precio">
    </div>
    
    <div class="mb-3">
      <label for="descripcion" class="form-label">Descripción:</label>
      <input type="text"
        class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripción">
    </div>

    <div class="mb-3">
    <label for="localidad" class="form-label">Servicio:</label>
      <select name="localidad" class="input" required>
                  <?php foreach($lugares as $registros){ ?>
                     <option value="<?php echo $registros['lugares'];?>"><?php echo $registros['lugares'];?></option>
                     <?php } ?>
                     
      </select>

    </div>

    
    <div class="mb-3">
      <label for="localidad" class="form-label">Localidad:</label>
      <input type="text"
        class="form-control" name="localidad" id="localidad" aria-describedby="helpId" placeholder="localidad">
    </div>


    <div class="mb-3">
    <label for="localidad" class="form-label">Servicio:</label>
      <select name="localidad" class="input" required>
                  <?php foreach($lugares as $registros){ ?>
                     <option value="<?php echo $registros['lugares'];?>"><?php echo $registros['lugares'];?></option>
                     <?php } ?>
                     
      </select>

    </div>


    <div class="mb-3">
      <label for="localidad" class="form-label">Servicio:</label>
      <input type="text"
        class="form-control" name="localidad" id="localidad" aria-describedby="helpId" placeholder="localidad">
    </div>

    <button type="submit" class="btn btn-success">Agregar:</button>

    <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

    </form>

    </div>
</div>



<?php include("../../templates/footer.php");?>