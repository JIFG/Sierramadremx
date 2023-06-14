<?php
include './componentes/conexion.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="./css/estilos.css">
   <link rel="stylesheet" href="./css/style.css">
</head>
<body>
       <!--Inicio del Header-->
   <?php
   include './componentes/header.php';

   ?>

   <!--final del Header-->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=6181021883&text=Hola,%20me%20gustaria%20Obtener%20m%C3%A1s%20informaci%C3%B3n" class="float" target="_blank">
<i class="fab fa-whatsapp my-float"></i>
</a>
<!-- about section starts  -->

<section class="about">

   <div class="row">
      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>
      <div class="content">
         <h3>Porque deberías de elegirnos?</h3>
         <p>agregar aqui el texto</p>
         <a href="contacto.php" class="inline-btn">contacto</a>
      </div>
   </div>

</section>

<!-- about section ends -->


     <!--inicio del footer-->
     <?php
   include './componentes/footer.php';

   ?>
   <!--final del footer-->
    
</body>
</html>