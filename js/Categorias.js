function agregarCategoria()
{
	var categoria = $('#nombreCategoria').val();

    if(categoria == "")
    {
       swal("Debes agregar una Categoria");
       return false;
    }
    else
    {
       $.ajax({
           type:"POST",
           data:"categoria=" + categoria,
           url:"../procesos/categorias/agregarCategoria.php",
           success:function(respuesta)
           {
             respuesta = respuesta.trim();

             if(respuesta == 1)
             {
                $('#tablaCategorias').load("categorias/tablaCategoria.php"); 
                $('#nombreCategoria').val("");
                swal("AGREGADA", "Categoria, con exito", "success");
             }
             else
             {
                swal("FALLO", "Categoria no agregada", "error");
             }
          }
      });
  }
}

function eliminarCategorias(idCategoria)
{
   idCategoria = parseInt(idCategoria);
   if(idCategoria < 1)
   {
      swal("No tienes id de categoria");
      return false;
   }
   else
   {
      //*********************************************************************
      
      swal({
             title: "ELIMINAR CATEGORIA?",
             text: "Si la eliminas, No podras recuperarla",
             icon: "warning",
             buttons: true,
             dangerMode: true,
          })
      .then((willDelete) => {
        if (willDelete) {
               
               $.ajax({

                     type:"POST",
                     data:"idCategoria=" + idCategoria,
                     url:"../procesos/categorias/eliminarCategoria.php",
                     success:function(respuesta)
                     {
                        respuesta = respuesta.trim();
                        if(respuesta == 1)
                        {
                         $('#tablaCategorias').load("categorias/tablaCategoria.php");    
                         swal("Eliminado con exito!", {
                           icon: "success",
                         });
                        }
                        else
                        {
                           swal("ERROR", "No se pudo eliminar categoria", "error");
                           console.log(respuesta);
                        }
                     }
               });
        } 
      });

      //*********************************************************************
   }
}

function obtenerDatosCategoria(idCategoria)
{
    $.ajax({

          type:"POST",
          data:"idCategoria=" + idCategoria,
          url:"../procesos/categorias/obtenerCategoria.php",
          success:function(respuesta)
          {
             respuesta = jQuery.parseJSON(respuesta);

             $('#idCategoria').val(respuesta['idCategoria']);
             $('#categoriaU').val(respuesta['nombreCategoria']);
          }
    });
}

function actualizaCategoria()
{
   if($('#categoriaU').val() == "")
   {
      swal("No hay categoria!!");
      return false;
   }
   else
   {
      $.ajax({

         type:"POST",
         data:$('#frmActualizaCategoria').serialize(),
         url:"../procesos/categorias/actualizaCategoria.php",
         success:function(respuesta)
         {
           respuesta =  respuesta.trim();

           if(respuesta == 1)
           {
               $('#tablaCategorias').load("categorias/tablaCategoria.php");
               $('#btnCerrarActualizarCategoria').click();
               swal("ACTUALIZADO", "con exito", "success");
           }
           else
           {
               swal("ERROR", "no se pudo actualizar", "error");
           }
         }
      })
   }
}