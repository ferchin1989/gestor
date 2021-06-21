<?php 

   class Conectar
   {
      public function conexion()
      {
          $servidor ="localhost";
          $usuario ="root";
          $pass ="";
          $base ="imagenes";

          $conexion = mysqli_connect($servidor,
                                     $usuario,
                                     $pass,
                                     $base);
          /*$conexion = set_charset('utf8mb4');*/

          return $conexion;
      } 
   }

 ?>