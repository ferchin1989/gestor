<?php 

    session_start();
    if(isset($_SESSION['usuario']))
    {

    
    include "header.php"; 
?>

    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Gestor de Imagenes</h1>
          <div class="row">
            <div class="col-sm-4">
              <span class="btn btn-dark" data-toggle="modal" data-target="#modalAgregarArchivos">
              <span class="fab fa-accusoft"></span> Agregar Archivos 
              </span>
            </div>                
          </div>
        <hr>
        <div id="tablaGestorArchivos"></div>
      </div>
    </div>

    <!--///////////////////////////////////////////////////////////////-->

    <!-- Modal Agregar Archivos-->
    <div class="modal fade" id="modalAgregarArchivos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Archivos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form id="frmArchivos" enctype="multipart/form-data" method="post">
              
              <label>Categoria</label>
              <div id="categoriasLoad"></div>
              <label>Selecciona Archivos</label>
              <input type="file" name="archivos[]" id="archivos[]" class="form-control" multiple="">
              <br><h6>¡¡Maximo 20 Archivos!!</h6>

            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btnGuardarArchivos">Guardar</button>
          </div>
        </div>
      </div>
    </div>


    <!--///////////////////////////////////////////////////////////////-->


    <!-- Modal Visualizar Archivo-->
    <div class="modal fade" id="visualizarArchivo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Archivo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

              <div id="archivoObtenido">
                
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>


    <!--///////////////////////////////////////////////////////////////-->


<?php include "footer.php"; ?>
<!--///////////////////script.js////////////////////////////////-->

<script src="../js/Gestor.js"></script>

<!--///////////////////////////////////////////////////////////////-->


<script type="text/javascript">
  $(document).ready(function(){
     $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
     $('#categoriasLoad').load("categorias/selectCategorias.php");

     $('#btnGuardarArchivos').click(function()
     {
       
       agregarArchivosGestor();
       
     });
  });
</script>

<?php   
    
    }
    else
    {
      header("location:../index.php");
    }

 ?>