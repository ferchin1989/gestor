<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min">
    <link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.12.1/jquery-ui.theme.css">
    <link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.12.1/jquery-ui.css">
</head>
<body style="background-color: #DCDCDC;">

	<div  class="container">
		<h1 style="text-align: center;">Registro de Usuario</h1>
		<hr>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
			     <form id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">

				     	<label>Nombre</label>
					    <input type="text" name="nombre" id="nombre" class="form-control" required="">
					    <label>Fecha de Nacimiento</label>
					    <input type="text" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required="" readonly="" placeholder="Click para seleccionar fecha">
					    <label>Email o Correo</label>
					    <input type="email" name="email" id="email" class="form-control" required="">
					    <label>Nombre Usuario</label>
					    <input type="text" name="usuario" id="usuario" class="form-control" required="">
					    <label>Password o Contraseña</label>
					    <input type="password" name="pass" id="pass" class="form-control" required="">
					    <br>
					    <div class="row">

					    	<div class="col-sm-6 text-left">
					    		<button class="btn btn-primary">Registrar</button>
					    	</div>
					    	<div class="col-sm-6 text-right">
					    		<a href="index.php" class="btn btn-success">Login</a>
					    	</div>
					       			       
					    </div>


			     </form>	
			</div>
			<div class="col-sm-4"></div>			
		</div>
	</div>


<script src="librerias/jquery/jquery-3.4.1.min.js"></script>
<script src="librerias/jquery-ui-1.12.1/jquery-ui.js"></script>
<script src="librerias/sweetalert/sweetalert.min.js"></script>

<script type="text/javascript">

    $(function()
    {
    	var fechaA = new Date();
    	var yyyy = fechaA.getFullYear();

    	$("#fechaNacimiento").datepicker({

    		changeMonth: true,
    		changeYear: true,
    		yearRange:'1900:'+yyyy,
    		dateFormat: "dd-mm-yy"
    	});
    });
  

	
		function agregarUsuarioNuevo() {
			$.ajax({
				method: "POST",
				data: $('#frmRegistro').serialize(),
				url: "procesos/usuario/registro/agregarUsuario.php",
				success:function(respuesta){
					respuesta = respuesta.trim();

					if (respuesta == 1)
					{
						$("#frmRegistro")[0].reset();
						swal("AGREGADO", "Usuario con exito!", "success");
					} 
					else if(respuesta == 2)
					{
						swal("Usuario ya Registrado!- intente de nuevo");
					} 
					else if(respuesta == 3)
					{
						swal("Email ya Registrado!- intente de nuevo");
					}
					else 
					{
						swal("ERROR", "al agregar Usuario!!", "Error");
					}
				}
			});
			return false;
		}
	</script>
</body>
</html>