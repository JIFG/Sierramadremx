<?php 
include("../../bd.php");

if (isset($_GET['txtID'])) {
    $txtID = isset($_GET['txtID']) ? $_GET['txtID'] : "";
    $sentencia = $conexion->prepare("DELETE FROM precios WHERE id=:id ");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
}

//seleccionar registros
$sentencia=$conexion->prepare("SELECT * FROM `precios`");
$sentencia->execute();
$precios=$sentencia->fetchAll(PDO::FETCH_ASSOC);



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
                    <th scope="col">Precios</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            
            <tbody>
            <?php foreach($precios as $registros){ ?>
                <tr class="">
                
                    <td ><?php echo $registros['ID'];?></td>
                    <td ><?php echo $registros['precios'];?></td>
                    <td >
                    <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['ID'];?>">Editar</a>
                    |
                    <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ID'];?>">Eliminar</a>
                    </td>
                
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </div>

    
</div>
