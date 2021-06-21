<!DOCTYPE html>
<html>
<head>

	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min">

</head>
<body>

	

   <div class="wrapper fadeInDown">

      <div id="formContent">

    <!-- Tabs Titles -->

    <!-- Icon -->
         <div class="fadeIn first">
           <img src="img/login/login.jpg" id="icon" alt="User Icon" />
           <h1>C&M<br><br>Gestor De Archivos</h1>
         </div>

    <!-- Login Form -->
         <form method="post" id="frmLogin" onsubmit="return log()">
           <input type="text" id="login" class="fadeIn second" name="login" placeholder="Usuario" required="">
           <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña" required="">
           <input type="submit" class="fadeIn fourth" value="Ingresar">
         </form>

    <!-- Remind Passowrd -->
         <div id="formFooter">
            <a class="underlineHover" href="registro.php">Registrarse</a>
         </div>

      </div>
    </div>


<script src="librerias/jquery/jquery-3.4.1.min.js"></script>
<script src="librerias/sweetalert/sweetalert.min.js"></script>

  <script type="text/javascript">
      function log()
      {
        $.ajax({

            type:"POST",
            data:$('#frmLogin').serialize(),
            url:"procesos/usuario/login/login.php",
            success:function(respuesta)
            {
              respuesta =respuesta.trim();
              /*alert(respuesta);*/

              if(respuesta ==1)
              {
                window.location ="vistas/inicio.php";
              }
              else
              {
                swal("ERROR","Usuario o Contraseña incorrectas","error");
              }
            }

        });

        return false;
       }
  </script>

</body>
</html>