<?php 
include("admin/bd.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propiedades</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
   <link rel="stylesheet" href="./css/estilos.css">
   <link rel="stylesheet" href="./css/estilos2.css">
   <link rel="stylesheet" href="./css/style.css">
</head>
<body>
      <!--Inicio del Header-->
   <?php
   include './componentes/header.php';

   ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=526182744225&text=Hola,%20me%20gustaria%20Obtener%20m%C3%A1s%20informaci%C3%B3n" class="float" target="_blank">
<i class="fab fa-whatsapp my-float"></i>
</a>

   <!--final del Header-->
    <!--Inicio de la lista-->
    <section class="lista">

<h1 class="heading"> Ver Propiedades</h1>

<div class="box-contenedor">
   <?php

   $total_images = 0;
   $select_properties = $conexion->prepare("SELECT * FROM `tbl_propiedades` ORDER BY ID ");
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
                  <p><i class="fa-solid fa-landmark"></i><span><?= $fetch_property['servicio']; ?></span></p>

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



</section>


    <!--Final de la lista-->



   
    <!--inicio del footer-->
    <?php
   include './componentes/footer.php';



   ?>
   <!--final del footer-->
    
</body>
</html>