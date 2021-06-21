<?php 

   session_start();

   require_once "../../clases/Conexion.php";
   $c = new Conectar();
   $conexion = $c->conexion();
   $idUsuario = $_SESSION['idUsuario'];

   $sql = "SELECT
			  archivos.id_archivo AS idArchivo,
			  usuarios.nombre AS nombreUsuario,
			  categorias.nombre AS categoria,
			  archivos.nombre nombreArchivo,
			  archivos.tipo AS tipoArchivo,
			  archivos.ruta AS rutaArchivo,
			  documento.documento AS documentoIdentidad,
			  archivos.fecha AS fecha
  
			FROM 
			  t_archivos AS archivos
			        INNER JOIN
			        t_usuarios AS usuarios ON archivos.id_usuario = usuarios.id_usuario
			        INNER JOIN
			        t_categorias AS categorias ON archivos.id_categoria = categorias.id_categoria
			        INNER JOIN 
                    t_documento AS documento ON archivos.nombre = documento.numero

			        AND archivos.id_usuario = '$idUsuario'" ;

    $result = mysqli_query($conexion, $sql);

 ?>

<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-hover table-dark" id="tablaGestorDataTable" 	>
				<thead>
					<tr style="text-align: center;">
						<th>Categoria</th>
						<th>Nombre</th>
						<th>Documento</th>
						<th>Fecha</th>
						<th>Extension Archivo</th>
						<th>Descargar</th>
						<th>Visualizar</th>
						<!--<th>Eliminar</th>-->
					</tr>
				</thead>
				<tbody style="text-align: center;">

                <?php 


                    /*********************************
                     * Arreglo de extensiones validas
                     *********************************/

                    $extensionesValidas = array('png','PNG', 'jpg','JPG','jpeg','JPEG', 'pdf','PDF', 'mp3','MP3', 'mp4','MP4');

                    /*********************************
                     * -------------------------------
                     *********************************/

                    while($mostrar = mysqli_fetch_array($result))
                    {
                       $rutaDescarga = "../ArchivosImagenes/".$idUsuario."/".$mostrar['nombreArchivo'];
                       $nombreArchivo = $mostrar['nombreArchivo'];
                       $idArchivo = $mostrar['idArchivo'];


                 ?>     

					<tr>
						<td><?php echo $mostrar['categoria'] ?></td>
						<td><?php echo $mostrar['nombreArchivo'] ?></td>
						<td><?php echo $mostrar['documentoIdentidad'] ?></td>
						<td><?php echo $mostrar['fecha'] ?></td>
						<td><?php echo $mostrar['tipoArchivo'] ?></td>
						<td>
							<a href="<?php echo $rutaDescarga; ?>" download="<?php echo $nombreArchivo; ?>" class="btn btn-primary btn-sm">
						    <span class="fas fa-file-download"></span>
							</a>
						</td>
						<td>
                  <?php 	

                      for($i=0; $i < count($extensionesValidas); $i++)
                      {
                          if($extensionesValidas[$i] == $mostrar['tipoArchivo'])
                          {
                  ?>       	
										<span class="btn btn-success btn-sm" 
										      data-toggle="modal" 
										      data-target="#visualizarArchivo" 
										      onclick="obtenerArchivoPorId('<?php echo $idArchivo ?>')">

											<span class="far fa-eye"></span>
										</span>  
						<?php                        
                          }
                      }

                  ?><!--
						</td>
						<td>
							<span class="btn btn-danger btn-sm" onclick="eliminarArchivo('<?php echo $idArchivo ?>')">
								<span class="far fa-trash-alt"></span>
							</span>
						</td>
					</tr> 
				     -->

				<?php 

                    }

                ?>  

				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
        $('#tablaGestorDataTable').DataTable();
	});
</script>
