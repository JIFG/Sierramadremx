<?php 

    include("../../bd.php");

    //borrar registro correspondiente del ID
    if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM tbl_servicios WHERE id=:id ");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    }
        

    //seleccionar registros
    $sentencia=$conexion->prepare("SELECT * FROM `tbl_servicios`");
    $sentencia->execute();
    $lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);




include("../../templates/header.php");?>

<div class="card">
    <div class="card-header">
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registro</a>    

    </div>
    <div class="card-body">
    <div class="table-responsive-sm">
        <table class="table table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Icono</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista_servicios as $registros){ ?>
                <tr class="">
                    <td><?php echo $registros['ID'];?></td>
                    <td><?php echo $registros['icono'];?></td>
                    <td><?php echo $registros['titulo'];?></td>
                    <td><?php echo $registros['descripción'];?></td>
                    <td>
                    
                    <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['ID'];?>">Editar</a>
                    |
                    <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ID'];?>">Eliminar</a>
                </tr>
                <?php } ?>
                </tr>
            </tbody>
        </table>
    </div>
    
    </div>
</div>

<?php include("../../templates/footer.php");?>