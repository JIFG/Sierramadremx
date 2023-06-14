<?php
include './admin/bd.php';

$sentencia = $conexion->prepare("SELECT * FROM `tbl_servicios`");
$sentencia->execute();
$lista_servicios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia = $conexion->prepare("SELECT * FROM `tbl_configuraciones`");
$sentencia->execute();
$lista_configuraciones = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia = $conexion->prepare("SELECT precios FROM `precios` ORDER BY CAST(precios AS DECIMAL(10, 2))");
$sentencia->execute();
$precios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia = $conexion->prepare("SELECT FORMAT(CONVERT(precios, DECIMAL(10, 2)), 2) AS precios FROM precios ORDER BY CAST(precios AS DECIMAL(10, 2))");
$sentencia->execute();
$precios2 = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia = $conexion->prepare("SELECT * FROM `lugares`");
$sentencia->execute();
$lugares = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia = $conexion->prepare("SELECT * FROM `estados`");
$sentencia->execute();
$estados = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia = $conexion->prepare("SELECT * FROM `servicio`");
$sentencia->execute();
$servicio = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Inicio</title>


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

   <link rel="stylesheet" href="./css/estilos.css">
   <link rel="stylesheet" href="./css/estilos2.css">
   <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
   <link rel="stylesheet" href="./css/style.css">
</head>

<body>
   <!--Inicio del Header-->
   <?php
   include './componentes/header.php';

   ?>


   <!--final del Header-->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
   <a href="https://api.whatsapp.com/send?phone=526182744225&text=Hola,%20me%20gustaria%20Obtener%20m%C3%A1s%20informaci%C3%B3n" class="float" target="_blank">
      <i class="fab fa-whatsapp my-float"></i>
   </a>
   <!--Inicio del Home-->


   <div class="home">

      <section class="center">

         <form action="buscar.php" method="post">
            <h3><?php echo $lista_configuraciones[5]['valor']; ?></h3>

            <div class="flex">
               <div class="box">
                  <p>Estado<span>*</span></p>

                  <select name="h_lugar" class="input" required>
                     <?php foreach ($estados as $registro) { ?>

                        <option value="<?php echo $registro['estados']; ?>"><?php echo $registro['estados']; ?></option>

                     <?php } ?>
                  </select>

               </div>
               <div class="box">
                  <p>Tipo de Lugar <span>*</span></p>
                  <select name="h_tipo" class="input" required>
                     <?php foreach ($lugares as $registro) { ?>
                        <option value="<?php echo $registro['lugares']; ?>"><?php echo $registro['lugares']; ?></option>
                     <?php } ?>
                  </select>
               </div>
            </div>
            <div class="box">
               <p>Servicio <span>*</span></p>
               <select name="h_servicio" class="input" required>
                  <?php foreach ($servicio as $registro) { ?>
                     <option value="<?php echo $registro['servicio']; ?>"><?php echo $registro['servicio']; ?></option>
                  <?php } ?>

               </select>
            </div>
            <div class="box">
               <p>Precio Mínimo <span>*</span></p>
               <select name="h_min" class="input" required>
   <?php foreach($precios as $registros){ ?>
      <option value="<?php echo $registros['precios']; ?>">
         $<?php echo number_format($registros['precios']); ?>
      </option>
   <?php } ?>
</select>
            </div>
            <div class="box">
               <p>Precio Máximo <span>*</span></p>
               <select name="h_max" class="input" required>
               <?php foreach($precios as $registros){ ?>
      <option value="<?php echo $registros['precios']; ?>">
         $<?php echo number_format($registros['precios']); ?>
      </option>
   <?php } ?>
</select>
            </div>
            <input type="submit" value="<?php echo $lista_configuraciones[6]['valor']; ?>" name="h_buscar" class="btn">
         </form>

      </section>

   </div>

   <!--final del Home-->
   <!--Inicio de servicios-->
   <section class="services">

      <h1 class="heading"><?php echo $lista_configuraciones[7]['valor']; ?></h1>
      
      <div class="box-container">
      <?php foreach($lista_servicios as $registros){ ?>
         <div class="box">
         <i class= "fas <?php echo $registros["imagen"];?>"></i>
            <h3> <?php echo $registros["titulo"];?></h3>
            <p><?php echo $registros["descripción"];?></p>
         </div>
         <?php } ?>
      </div>

      

   </section>

   <!--final de servicios-->
    <!--Inicio de la lista-->
   <section class="lista">

      <h1 class="heading"><?php echo $lista_configuraciones[8]['valor']; ?></h1>

      <div class="box-contenedor">
         <?php

         $total_images = 0;
         $select_properties = $conexion->prepare("SELECT * FROM `tbl_propiedades` ORDER BY id DESC LIMIT  3");
         $select_properties->execute();
         if ($select_properties->rowCount() > 0) {
            while ($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)) {


               if (!empty($fetch_property['IMG_02'])) {
                  $image_coutn_02 = 1;
               } else {
                  $image_coutn_02 = 0;
               }
               if (!empty($fetch_property['IMG_03'])) {
                  $image_coutn_03 = 1;
               } else {
                  $image_coutn_03 = 0;
               }
               if (!empty($fetch_property['IMG_04'])) {
                  $image_coutn_04 = 1;
               } else {
                  $image_coutn_04 = 0;
               }
               if (!empty($fetch_property['IMG_05'])) {
                  $image_coutn_05 = 1;
               } else {
                  $image_coutn_05 = 0;
               }

               $total_images = (1 + $image_coutn_02 + $image_coutn_03 + $image_coutn_04 + $image_coutn_05);



         ?>
               <form action="" method="POST">
                  <div class="box">
                     <input type="hidden" name="property_id" value="<?= $fetch_property['ID']; ?>">


                     <div class="thumb">
                        <p class="total-images"><i class="far fa-image"></i><span><?= $total_images; ?></span></p>
                        <img width="50" src="./images/casas/<?php echo $fetch_property['IMG_01']; ?>" alt="">

                     </div>

                  </div>
                  <div class="box">
                     <h1 class="name"><?= $fetch_property['titulo']; ?></h1>
                     <div class="location"><i class="fa-solid fa-sack-dollar"></i></i><span><?= $fetch_property['precio']; ?></span></div>

                     <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['ubicacion']; ?></span></p>
                     <div class="flex">
                        <p><i class="fas fa-house"></i><span><?= $fetch_property['tipo']; ?></span></p>
                        <p><i class="fa-solid fa-earth-americas"></i><span><?= $fetch_property['localidad']; ?></span></p>
                        <i class="fa-solid fa-landmark"></i><span><?= $fetch_property['servicio']; ?></span></p>

                     </div>
                     <div class="boton1">
                        <a href="ver_propiedades.php?get_id=<?= $fetch_property['ID']; ?>" class="boton">Ver propiedad</a>

                     </div>
                  </div>
               </form>
         <?php
            }
         } else {
            echo '<p class="empty">Todavía no se an añadido propiedades! </p>';
         }
         ?>

      </div>

      <div style="margin-top: 2rem; text-align:center;">
         <a href="lista.php" class="inline-btn">ver propiedades</a>
      </div>

   </section>
    <!--Final de la lista-->




   <!--inicio del footer-->
   <?php
   include './componentes/footer.php';

   ?>
   <!--final del footer-->

   <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"
  ></script>


   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
   <script src="./js/script.js"></script>
   <?php
   include './componentes/mensaje.php';

   ?>
</body>

</html>