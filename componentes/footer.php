<?php include './admin/bd.php';

$sentencia=$conexion->prepare("SELECT * FROM `tbl_configuraciones`");
$sentencia->execute();
$lista_configuraciones=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="./css/estilos.css">
</head>
<body>
<footer class="footer">

<section class="flex">



   <div class="box">
      <a href="index.php"><span><?php echo $lista_configuraciones[9]['valor']; ?></span></a>
      <a href="acerca.php"><span><?php echo $lista_configuraciones[10]['valor']; ?></span></a>
      <a href="contacto.php"><span><?php echo $lista_configuraciones[11]['valor']; ?></span></a>
      <a href="lista.php"><span><?php echo $lista_configuraciones[12]['valor']; ?></span></a>
    
   </div>

   <div class="box">
      <a href="#"><span><span><?php echo $lista_configuraciones[13]['valor']; ?></span><i class="fab fa-facebook-f"></i></a>
      <a href="#"><span><span><?php echo $lista_configuraciones[14]['valor']; ?></span><i class="fab fa-twitter"></i></a>
      <a href="#"><span><span><?php echo $lista_configuraciones[15]['valor']; ?></span><i class="fab fa-linkedin"></i></a>
      <a href="#"><span><span><?php echo $lista_configuraciones[16]['valor']; ?></span><i class="fab fa-instagram"></i></a>

   </div>
   <div class="box">
      <a href="#"><i class="fas fa-phone"></i><span>123456789</span></a>
      <a href="#"><i class="fas fa-phone"></i><span>1112223333</span></a>
      <a href="#"><i class="fas fa-envelope"></i><span>vdvds@gmail.com</span></a>
      <a href="#"><i class="fas fa-map-marker-alt"></i><span>Durango</span></a>
   </div>

</section>

<div class="credit">&copy; copyright @ <?= date('Y'); ?> by <span>Jaredh</span> | Todos los derechos reservados</div>

</footer>
</body>
</html>

