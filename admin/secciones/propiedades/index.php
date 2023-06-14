<?php
include("../../bd.php");
if (isset($_GET['txtID'])) {
    $txtID = isset($_GET['txtID']) ? $_GET['txtID'] : "";

    try {
        $sentencia = $conexion->prepare("SELECT IMG_01, IMG_02, IMG_03, IMG_04, IMG_05 FROM tbl_propiedades WHERE id=:id ");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
        $registro_imagen = $sentencia->fetch(PDO::FETCH_ASSOC);

        $imagenes = array(
            $registro_imagen["IMG_01"],
            $registro_imagen["IMG_02"],
            $registro_imagen["IMG_03"],
            $registro_imagen["IMG_04"],
            $registro_imagen["IMG_05"]
        );

        foreach ($imagenes as $imagen) {
            if (!empty($imagen) && file_exists("../../../images/casas/" . $imagen)) {
                unlink("../../../images/casas/" . $imagen);
            }
        }

        $sentencia = $conexion->prepare("DELETE FROM tbl_propiedades WHERE id=:id ");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();

        echo "Registro eliminado exitosamente.";

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

//seleccionar registros
$sentencia=$conexion->prepare("SELECT * FROM `tbl_propiedades`");
$sentencia->execute();
$lista_propiedades=$sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");?>
<div class="card">
    <div class="card-header">
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registro</a>    
    </div>
    <div class="card-body">

    <div class="table-responsive">
        <table class="table table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Precio</th>
                    <th scope="col">tipo</th>
                    <th scope="col">ubicación</th>
                    <th scope="col">latitud</th>
                    <th scope="col">longitud</th>
                    <th scope="col">IMG_01</th>
                    <th scope="col">IMG_02</th>
                    <th scope="col">IMG_03</th>
                    <th scope="col">IMG_04</th>
                    <th scope="col">IMG_05</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Localidad</th>
                    <th scope="col">Servicio</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($lista_propiedades as $registros){ ?>
                <tr class="">
                
                    <td > <?php echo $registros['ID'];?>
                    <td ><?php echo $registros['titulo'];?></td>
                    <td ><?php echo $registros['precio'];?></td>
                    <td ><?php echo $registros['tipo'];?></td>
                    <td ><?php echo $registros['ubicacion'];?></td>
                    <td ><?php echo $registros['latitud'];?></td>
                    <td ><?php echo $registros['longitud'];?></td>
                    <td scope="col">
                        <img width="50" src="../../../images/casas/<?php echo $registros['IMG_01'];?>"/>
            </td>
                    <td scope="col">
                        <img width="50" src="../../../images/casas/<?php echo $registros['IMG_02'];?>"/>
            </td>
                    <td scope="col">
                        <img width="50" src="../../../images/casas/<?php echo $registros['IMG_03'];?>"/>
            </td>
                    <td scope="col">
                        <img width="50" src="../../../images/casas/<?php echo $registros['IMG_04'];?>"/>
            </td>
                    <td scope="col">
                        <img width="50" src="../../../images/casas/<?php echo $registros['IMG_05'];?>"/>
            </td>
                    <td ><?php echo $registros['descripcion'];?></td>
                    <td ><?php echo $registros['localidad'];?></td>
                    <td ><?php echo $registros['servicio'];?></td>
                    <td>
                    <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['ID'];?>">Editar</a>
                    |
                    <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ID'];?>">Eliminar</a>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    </div>

</div>

<?php include("../../templates/footer.php");?>