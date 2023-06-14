<?php
include("admin/bd.php");
include './componentes/header.php';

if (isset($_GET['get_id'])) {
   $get_id = $_GET['get_id'];
   $select_properties = $conexion->prepare("SELECT * FROM `tbl_propiedades` WHERE ID = ? ORDER BY ID DESC LIMIT 1");
   $select_properties->execute([$get_id]);
   if ($select_properties->rowCount() > 0) {
      while ($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)) {
         $property_id = $fetch_property['ID'];
         // Resto del código para mostrar los detalles de la propiedad
         $img01 = $fetch_property['IMG_01'];
         ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ver Propiedad</title>

   

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/estilos.css">
   <link rel="stylesheet" href="./css/estilos3.css">

   <link rel="stylesheet" href="./css/style.css">

   


</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=526182744225&text=Hola,%20me%20gustaria%20Obtener%20m%C3%A1s%20informaci%C3%B3n" class="float" target="_blank">
<i class="fab fa-whatsapp my-float"></i>
</a>
   <!-- view property section starts  -->
   <section class="view-property">
      <h1 class="heading">Detalles</h1>
               <div class="details">
                  
                  <div class="swiper images-container">
                     <div class="swiper-wrapper">
                        <?php if(!empty($fetch_property['IMG_01'])){ ?>
                        <img src="./images/casas/<?= $fetch_property['IMG_01']; ?>" alt="" class="swiper-slide">
                        <?php } ?>
                        <?php if(!empty($fetch_property['IMG_02'])){ ?>
                        <img src="./images/casas/<?= $fetch_property['IMG_02']; ?>" alt="" class="swiper-slide">
                        <?php } ?>
                        <?php if(!empty($fetch_property['IMG_03'])){ ?>
                        <img src="./images/casas/<?= $fetch_property['IMG_03']; ?>" alt="" class="swiper-slide">
                        <?php } ?>
                        <?php if(!empty($fetch_property['IMG_04'])){ ?>
                        <img src="./images/casas/<?= $fetch_property['IMG_04']; ?>" alt="" class="swiper-slide">
                        <?php } ?>
                        <?php if(!empty($fetch_property['IMG_05'])){ ?>
                        <img src="./images/casas/<?= $fetch_property['IMG_05']; ?>" alt="" class="swiper-slide">
                        <?php } ?>
                     </div>
                     <div class="swiper-pagination"></div>
                  </div>
                  <h3 class="name"><?= $fetch_property['titulo']; ?></h3>
                  <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['ubicacion']; ?></span></p>
                  <div class="info">
                     <p><i class="fa-solid fa-sack-dollar"></i><span><?= $fetch_property['precio']; ?></span></p>
                     <p><i class="fas fa-house"></i><span><?= $fetch_property['tipo']; ?></span></p>
                     <p><i class="fa-solid fa-earth-americas"></i><span><?= $fetch_property['localidad']; ?></span></p>
                     <p> <i class="fa-solid fa-landmark"></i></i><span><?= $fetch_property['servicio']; ?></span></p>
                  </div>
                  
                  <h3 class="title">Descripción</h3>
                  <br>
                  <p class="description"><?= $fetch_property['descripcion']; ?></p>
                  <br>
                  <br>
                  <h3 class="title">Ubicación</h3>
                  <br>
                  <a class="inline-btn" href="https://www.google.com/maps/search/?api=1&query=<?php echo $fetch_property['latitud']; ?>,<?php echo $fetch_property['longitud']; ?>" target="_blank">Ver en Google Maps</a>
                  <br>
                  <br>
                  <br>
                  <br>

                  <h3 class="title">Contáctanos</h3>
                  
                  <br>
                  <form action="" method="post" class="flex-btn">
                     <input type="hidden" name="property_id" value="<?= $property_id; ?>">
                     <a href="contacto.php" class="inline-btn">Mandar mensaje</a>
                  </form>
                  <br>
                  <br>
                  <br>
               </div>
               <?php
            }
         } else {
            echo '<p class="empty">Property not found! <a href="post_property.php" style="margin-top:1.5rem;" class="btn">add new</a></p>';
         }
      } else {
         echo '<p class="empty">Invalid property ID!</p>';
      }
      ?>
   </section>

   <!-- Resto del código de la página -->

   <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   <?php include 'componentes/footer.php'; ?>
   <script src="js/script.js"></script>
   <?php include 'componentes/mensaje.php'; ?>
   



</body>
</html>
