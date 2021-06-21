
<?php 	

   session_start();
   require_once "../../clases/Conexion.php";
   $idUsuario = $_SESSION['idUsuario'];
   $conexion = new Conectar();
   $conexion = $conexion->conexion();

 ?>

<div class="table-responsive">
	<table class="table table-hover table-dark" id="tablaCategoriasDataTable">
		<thead style="text-align: center;">
			<th>Nombre</th>
			<th>Fecha</th>
			<th>Editar</th>
			<th>Eliminar</th>
		</thead>
		<tbody style="text-align: center;">

           <?php 	
      
                $sql="SELECT id_categoria,
                             nombre,
                             fechaInsert
                        FROM t_categorias
                       WHERE id_usuario = '$idUsuario'";  

                $result = mysqli_query($conexion, $sql);    

                while($mostrar = mysqli_fetch_array($result))
                {
                	$idCategoria = $mostrar ['id_categoria'];

            ?>

			<tr>
				<td> <?php echo $mostrar['nombre']; ?></td>
				<td> <?php echo $mostrar['fechaInsert']; ?></td>
				<td>
					<span class="btn btn-info btn-sm" 
					onclick="obtenerDatosCategoria('<?php echo $idCategoria ?>')"
					data-toggle="modal" data-target="#modalActualizarCategoria">
						<span class="fas fa-pencil-alt"></span>
					</span>
				</td>
				<td>
					<span class="btn btn-danger btn-sm" 
					onclick="eliminarCategorias('<?php echo $idCategoria ?>')">
						<span class="far fa-trash-alt"></span>
					</span>
				</td>
			</tr>
			 <?php 

                }

			 ?>
		</tbody>	
	</table>
	
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaCategoriasDataTable').DataTable();
	});
</script>