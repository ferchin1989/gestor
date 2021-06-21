<?php 

    session_start();

    if(isset($_SESSION['usuario']))
    {
     include "header.php";
?>
     
        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">Categorías De Archivos</h1>

            <div class="row">
                <div class="col-sm-4">
                    <span class="btn btn-dark" data-toggle="modal" data-target="#modalAgregaCategoria">
                        <span class="fas fa-book"></span> Agregar Nueva Categoria 
                    </span>
                </div>                
            </div>
            <hr>
            <div class="row">
               <div class="col-sm-12">
                  <div id="tablaCategorias"></div>
               </div>                
            </div>
          </div>
        </div>

<!--///////////////////////////////////////////////////////////////////-->
        <!-- Modal Agregar Categoria-->
        <div class="modal fade" id="modalAgregaCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <form id="frmCategorias">

                    <label>Nombre Categoría</label>
                    <input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control">

                </form>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarCategoria">Guardar</button>
              </div>
            </div>
          </div>
        </div>

<!--///////////////////////////////////////////////////////////////////-->

        <!-- Modal Actualizar Categoria-->
        <div class="modal fade" id="modalActualizarCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                 <form id="frmActualizaCategoria">
                    <input type="text" name="idCategoria" id="idCategoria" hidden="">
                    <label>Categoria</label>
                    <input type="text" name="categoriaU" id="categoriaU"class="form-control">
                 </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarActualizarCategoria">Cerrar</button>
                <button type="button" class="btn btn-info" id="btnActualizaCategoria">Actualizar</button>
              </div>
            </div>
          </div>
        </div>

<!--///////////////////////////////////////////////////////////////////-->

<?php     
     include "footer.php";

 ?>
 <!--/////////////////scripts.js//////////////////////////////////-->

    <script src="../js/Categorias.js"></script>

<!--///////////////////////////////////////////////////////////////-->

    <script type="text/javascript">
      $(document).ready(function(){
         $('#tablaCategorias').load("categorias/tablaCategoria.php");

         $('#btnGuardarCategoria').click(function()
         {
            
            agregarCategoria();

         });

         $('#btnActualizaCategoria').click(function()
         {
              actualizaCategoria();
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