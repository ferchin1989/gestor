<?php 

     require_once "../../../clases/Usuario.php";

     $pass = sha1($_POST['pass']);
     $fechaNacimiento = explode("-", $_POST['fechaNacimiento']);
     $fechaNacimiento = $fechaNacimiento[2] . "-" . $fechaNacimiento[1] . "-" . $fechaNacimiento[0];
     $datos = array(
                        "nombre" => $_POST['nombre'],
                        "fechaNacimiento" => $fechaNacimiento,
                        "email" => $_POST['email'],
                        "usuario" => $_POST['usuario'],
                        "pass" => $pass
                   );

     $usuario = new usuario();
     echo $usuario->agregarUsuario($datos);





 ?>