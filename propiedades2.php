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
   <title>View Property</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./css/estilos.css">
   <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=526182744225&text=Hola,%20me%20gustaria%20Obtener%20m%C3%A1s%20informaci%C3%B3n" class="float" target="_blank">
<i class="fab fa-whatsapp my-float"></i>
</a>
   <!-- view property section starts  -->
   
<!-- view property section starts  -->
<section class="view-property">
  <h1 class="heading">Detalles</h1>
  <div class="details">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <?php if(!empty($fetch_property['IMG_01'])){ ?>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <?php } ?>
        <?php if(!empty($fetch_property['IMG_02'])){ ?>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <?php } ?>
        <?php if(!empty($fetch_property['IMG_03'])){ ?>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <?php } ?>
      </div>
      <div class="carousel-inner">
        <?php if(!empty($fetch_property['IMG_01'])){ ?>
          <div class="carousel-item active">
            <img src="./images/casas/<?= $fetch_property['IMG_01']; ?>" class="d-block w-100" alt="">
          </div>
        <?php } ?>
        <?php if(!empty($fetch_property['IMG_02'])){ ?>
          <div class="carousel-item">
            <img src="./images/casas/<?= $fetch_property['IMG_02']; ?>" class="d-block w-100" alt="">
          </div>
        <?php } ?>
        <?php if(!empty($fetch_property['IMG_03'])){ ?>
          <div class="carousel-item">
            <img src="./images/casas/<?= $fetch_property['IMG_03']; ?>" class="d-block w-100" alt="">
          </div>
        <?php } ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <h3 class="name"><?= $fetch_property['titulo']; ?></h3>
    <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['ubicacion']; ?></span></p>
    <div class="info">
      <p><i class="fa-solid fa-sack-dollar"></i><span><?= $fetch_property['precio']; ?></span></p>
      <p><i class="fas fa-house"></i><span><?= $fetch_property['tipo']; ?></span></p>
      <p><i class="fa-solid fa-earth-americas"></i><span><?= $fetch_property['localidad']; ?></span></p>
    </div>
    <h3 class="title">Descripcion</h3>
    <p class="description"><?= $fetch_property['descripcion']; ?></p>
    <h3 class="title">ubicacion</h3>
    <a class="inline-btn" href="https://www.google.com/maps/search/?api=1&query=<?php echo $fetch_property['latitud']; ?>,<?php echo $fetch_property['longitud']; ?>" target="_blank">Ver en Google Maps</a>
    <p class="description"><?= $fetch_property['descripcion']; ?></p>
    <form action="" method="post" class="flex-btn">
      <input type="hidden" name="property_id" value="<?= $property_id; ?>">
      <a href="contacto.php" class="inline-btn">Mandar mensaje</a>
    </form>
  </div>
</section>
<!-- view property section ends  -->

   <?php include 'componentes/footer.php'; ?>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
   <script src="js/script.js"></script>
   <?php include 'componentes/mensaje.php'; ?>
</body>
</html>
<?php
      } // Cierre del while
   } // Cierre del if
} // Cierre del if
?>
