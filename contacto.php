<?php
include './componentes/conexion.php';
if(isset($_POST['send'])){

   $msg_id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $message = $_POST['message'];
   $message = filter_var($message, FILTER_SANITIZE_STRING);

   $verify_contact = $conexion->prepare("SELECT * FROM `mensajes` WHERE nombre = ? AND email = ? AND numero = ? AND mensaje = ?");
   $verify_contact->execute([$name, $email, $number, $message]);

   if($verify_contact->rowCount() > 0){
      $warning_msg[] = 'message sent already!';
   }else{
      $send_message = $conexion->prepare("INSERT INTO `mensajes`(id, nombre, email, numero, mensaje) VALUES(?,?,?,?,?)");
      $send_message->execute([$msg_id, $name, $email, $number, $message]);
      $success_msg[] = 'message send successfully!';
   }

}

?>

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="./css/estilos.css">
</head>
<body>
    <!--Inicio del Header-->
   <?php
   include './componentes/header.php';

   ?>

   <!--final del Header-->
<!-- contact section starts  -->

<section class="contact">

   <div class="row">
      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>
      <form action="" method="post">
         <h3>Contacto</h3>
         <input type="text" name="name" required maxlength="50" placeholder="Ingresa tu nombre" class="box">
         <input type="email" name="email" required maxlength="50" placeholder="ingresa tu email" class="box">
         <input type="number" name="number" required maxlength="10" max="9999999999" min="0" placeholder="ingresa tu numero telefónico" class="box">
         <textarea name="message" placeholder="Ingresa tu mensaje" required maxlength="1000" cols="30" rows="10" class="box"></textarea>
         <input type="submit" value="Enviar Mensaje" name="send" class="btn">
      </form>
   </div>

</section>

<!-- contact section ends -->
   
     <!--inicio del footer-->
     <?php
   include './componentes/footer.php';

   ?>
   <!--final del footer-->
    
</body>
</html>