<?php include './admin/bd.php';

$sentencia=$conexion->prepare("SELECT * FROM `tbl_configuraciones`");
$sentencia->execute();
$lista_configuraciones=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>


<header class="header">

   <nav class="navbar nav-1">
      <section class="flex">
         <a href="index.php" class="logo"><i class="fas fa-house"></i><span><?php echo $lista_configuraciones[0]['valor']; ?></a>

      </section>
   </nav>

   <nav class="navbar nav-2">
      <section class="flex">
       
            <ul>
           
               <li><a href="lista.php"><span><?php echo $lista_configuraciones[2]['valor']; ?></a>
                 
               </li>
               <li><a href="acerca.php"><span><?php echo $lista_configuraciones[3]['valor']; ?></a>
        
               </li>
               <li><a href="contacto.php"><span><?php echo $lista_configuraciones[4]['valor']; ?></a>
                
               </li>
            </ul>
         </div>

        
      </section>
   </nav>

</header>