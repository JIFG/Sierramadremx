<?php
include './componentes/conexion.php';
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
    <!-- Inicio del Header -->
   <?php
   include './componentes/header.php';
   ?>
   <!-- Final del Header -->
 

   <!-- Contact section starts -->
<section class="contact">
   <div class="row">
      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>
      <form name="formulario-contacto" method="post">
         <h3>Contacto</h3>
         <input type="text" name="name" id="nombre" required maxlength="50" placeholder="Ingresa tu nombre" class="box">
         <input type="email" name="email" id="email" required maxlength="50" placeholder="Ingresa tu email" class="box">
         <textarea name="message" id="mensaje" placeholder="Ingresa tu mensaje" required maxlength="1000" cols="30" rows="10" class="box"></textarea>
         <input id="enviarCorreo" type="submit" value="Enviar Mensaje" name="send" class="btn">
         <p id="mensajeError" style="color: red; display: none;">Por favor, complete todos los campos.</p>
      </form>
   </div>
</section>
<!-- Contact section ends -->

<!-- Inicio del footer -->
<?php
include './componentes/footer.php';
?>
<!-- Final del footer -->

<script>
    const formulario = document.forms['formulario-contacto'];
    const mensajeError = document.getElementById('mensajeError');
    const correoEnvio = document.getElementById('enviarCorreo');

    formulario.addEventListener('submit', function(e) {
        e.preventDefault();

        const nombre = formulario.elements['name'].value;
        const email = formulario.elements['email'].value;
        const mensaje = formulario.elements['message'].value;

        if (nombre.trim() === '' || email.trim() === '' || mensaje.trim() === '') {
            mensajeError.style.display = 'block';
        } else {
            mensajeError.style.display = 'none';

            const mensajeFormateado = encodeURIComponent(mensaje);
            const asunto = encodeURIComponent(nombre);
            window.location.href = `mailto:sierramadreoficialdgo@gmail.com?subject=${asunto}&body=${mensajeFormateado}&from=${email}`;
        }
    });
</script>
</body>
</html>

