<?php
include './componentes/conexion.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acerca</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="./css/estilos.css">
</head>
<body>
       <!--Inicio del Header-->
   <?php
   include './componentes/header.php';

   ?>

   <!--final del Header-->
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