<?php include './admin/bd.php';

$sentencia=$conexion->prepare("SELECT * FROM `tbl_servicios`");
$sentencia->execute();
$lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);
 
$sentencia=$conexion->prepare("SELECT * FROM `tbl_propiedades`");
$sentencia->execute();
$lista_servicios2=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

asdasdad
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Inicio</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="./css/estilos.css">
   <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
   <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
      integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
      crossorigin=""
    />
    <link rel="stylesheet" type="text/css" href="CSS/estilos.css" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css"
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
    />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</style>
</head>

<body>
   <!--Inicio del Header-->
   <?php
   include './componentes/header.php';

   ?>

   <!--final del Header-->
   <!--Inicio del Home-->


   <div class="home">

      <section class="center">

         <form action="buscar.php" method="post">
            <h3>Encuentra tu sitio ideal</h3>

            <div class="flex">
               <div class="box">
                  <p>Estado<span>*</span></p>
                  <select name="h_lugar" class="input" required>
                    
                     <option value="Durango">Durango</option>
                     <option value="Torreon">Torreon</option>
                     <option value="Mazatlan">Mazatlan</option>
                  </select>
               </div>
               <div class="box">
                  <p>Tipo de Lugar <span>*</span></p>
                  <select name="h_tipo" class="input" required>
                     <option value="Casa">Casa</option>
                     <option value="Terreno">Terreno</option>
                     <option value="Departamento">Departamento</option>
                  </select>
               </div>
<div class="box">
   <p>Precio Mínimo <span>*</span></p>
   <select name="h_min" class="input" required>
      <?php
         $values = [
            5000, 10000, 15000, 20000, 30000, 40000, 50000, 100000, 500000, 1000000,
            2000000, 3000000, 4000000, 5000000, 6000000, 7000000, 8000000, 9000000,
            10000000, 20000000, 30000000, 40000000, 50000000, 60000000, 70000000,
            80000000, 90000000, 100000000, 150000000, 200000000
         ];

         foreach ($values as $value) {
            echo "<option value=\"$value\">$" . number_format($value, 0, '', '.') . "</option>";
         }
      ?>
   </select>
</div>
               <div class="box">
                  <p>Precio Máximo <span>*</span></p>
                  <select name="h_max" class="input" required>
                     <option value="5000">$5.000</option>
                     <option value="10000">$10.000</option>
                     <option value="15000">$15.000</option>
                     <option value="20000">$20.000</option>
                     <option value="30000">$30.000</option>
                     <option value="40000">$40.000</option>
                     <option value="50000">$50.000</option>
                     <option value="100000">$100.000</option>
                     <option value="500000">$500.000</option>
                     <option value="1000000">$1.000.000</option>
                     <option value="2000000">$2.000.000</option>
                     <option value="3000000">$3.000.000</option>
                     <option value="4000000">$4.000.000</option>
                     <option value="5000000">$5.000.000</option>
                     <option value="6000000">$6.000.000</option>
                     <option value="7000000">$7.000.000</option>
                     <option value="8000000">$8.000.000</option>
                     <option value="9000000">$9.000.000</option>
                     <option value="10000000">$10.000.000</option>
                     <option value="20000000">$20.000.000</option>
                     <option value="30000000">$30.000.000</option>
                     <option value="40000000">$40.000.000</option>
                     <option value="50000000">$50.000.000</option>
                     <option value="60000000">$60.000.000</option>
                     <option value="70000000">$70.000.000</option>
                     <option value="80000000">$80.000.000</option>
                     <option value="90000000">$90.000.000</option>
                     <option value="100000000">$100.000.000</option>
                     <option value="150000000">$150.000.000</option>
                     <option value="200000000">$200.000.000</option>
                  </select>
               </div>
            </div>
            <input type="submit" value="Buscar Propiedad" name="h_buscar" class="btn">
         </form>

      </section>

   </div>
   <!-- Mapa -->
   <section class="center">
   <h1 class="heading">Mapa</h1>
   <div id="map"></div>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script
      src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
      integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
      crossorigin=""
    ></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script>
      const mymap = L.map('map').setView([24.0277, -104.6532], 12)
      L.tileLayer('https://{s}.tile.openstreetmap.de/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution:
          '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      }).addTo(mymap)
      //mapa de google
      googleStreets = L.tileLayer(
        'http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',
        {
          maxZoom: 20,
          subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
        }
      )
      googleStreets.addTo(mymap)
      //mapa de google
      var titulos = [];
var descripciones = [];
var popups = [];
var markers = [];

<?php foreach ($lista_servicios2 as $indice => $registro) { ?>
  // Obtener los valores de las columnas
  var titulo = "<?php echo $registro['titulo']; ?>";
  var descripcion = "<?php echo $registro['descripcion']; ?>";
  var longitud = <?php echo $registro['longitud']; ?>;
  var latitud = <?php echo $registro['latitud']; ?>;

  // Agregar los valores a los arrays
  titulos.push(titulo);
  descripciones.push(descripcion);

  // Crear el marcador y el popup
  var marcador = L.marker([longitud, latitud]);
  var popup<?php echo $indice; ?> = marcador.bindPopup(
    "<h1><?php echo $registro['titulo']; ?></h1>" +
    "<p><?php echo $registro['descripcion']; ?></p>" +
    "<img width='100%' src='./IMG/plazadearmas.jpg'/> " +
    "<button href='http://visitdurango.mx/directorio-de-servicios-turisticos/plaza-de-armas/#!/'>Ver Más</button>"
  ).openPopup();

  // Agregar el marcador al mapa
  marcador.addTo(mymap);

  // Agregar el popup al array de popups
  popups.push(popup<?php echo $indice; ?>);
<?php } ?>

for (var i = 0; i < popups.length; i++) {
  var popup = popups[i];
  markers.push(popup);
}
// Función que busca los marcadores
function searchMarkers() {
  // Obtiene el valor ingresado en el input
  var searchTerm = document.getElementById('searchInput').value;

  // Recorre los marcadores
  for (var i = 0; i < markers.length; i++) {
    var marker = markers[i];
    var popupText = marker.getPopup().getContent(); // Obtiene el contenido del popup del marcador

    // Si el término de búsqueda está en el contenido del popup, muestra el marcador
    if (popupText.includes(searchTerm)) {
      marker.addTo(mymap);
      marker.openPopup();
    } else {
      mymap.removeLayer(marker); // Remueve el marcador del mapa si no coincide con el término de búsqueda
    }
  }
}
</script>
   </section>
   <!-- Final del mapa -->
   <!--final del Home-->
   <!--Inicio de servicios-->
   <section class="services">

      <h1 class="heading">Lo más buscado</h1>
      
      <div class="box-container">
      <?php foreach($lista_servicios as $registros){ ?>
         <div class="box">
         <i class= "fas <?php echo $registros["icono"];?>"></i>
            <h3> <?php echo $registros["titulo"];?></h3>
            <p><?php echo $registros["descripción"];?></p>
            <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
         </div>
         <?php } ?>
      </div>

   </section>
   <!--final de servicios-->
    <!--Inicio de la lista-->
   <section class="listings">

      <h1 class="heading">Últimos añadidos</h1>

      <div class="box-container">
         <?php

         $total_images = 0;
         $select_properties = $conexion->prepare("SELECT * FROM `tbl_propiedades` ORDER BY id DESC ");
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
                     <div class="price"><i class="fa-solid fa-sack-dollar"></i></i><span><?= $fetch_property['precio']; ?></span></div>

                     <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['ubicacion']; ?></span></p>
                     <div class="flex">
                        <p><i class="fas fa-house"></i><span><?= $fetch_property['tipo']; ?></span></p>
                        <p><i class="fa-solid fa-earth-americas"></i><span><?= $fetch_property['localidad']; ?></span></p>

                     </div>
                     <div class="flex-btn">
                        <a href="ver_propiedades.php?get_id=<?= $fetch_property['ID']; ?>" class="btn">Ver propiedad</a>

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


   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
   <script src="./js/script.js"></script>
   <?php
   include './componentes/mensaje.php';

   ?>
</body>

</html>