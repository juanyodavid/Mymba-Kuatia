$(function() {
			load(1);// este es el buscador de la variable
		});
		function load(page){// significa que se ejecuta al ser llamado este archivo ya que se ejecuta la funcion
			var query=$("#q").val(); // la variable "query" es el buscador y se llama #q (buscar en sanitacion.php)
			var per_page=10; // declara esta variable con un valor de 10
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/sanitacion_ajax/vista_usuario.php',
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Cargando...");
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			})
		}



		$('#editProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var producto_add = button.data('producto_add') // crea la variable sanitacion_add y la informacion lo guarda en el boton.data (sanitacion_ADD)
		  $('#producto_edit').val(producto_add) //al editar en la posicion de sanitacion add va a aparecer la que se cargo en sanitacion_add
            // esto mismo sucede con las otras variables por eso no funcionaba fecha
		  var dosis_add = button.data('dosis_add') 
		  $('#dosis_edit').val(dosis_add)
		  var ind_add = button.data('ind_add') 
		  $('#ind_edit').val(ind_add)
		  var obs_add = button.data('obs_add') 
		  $('#obs_edit').val(obs_add)
		  var anim_add = button.data('anim_add') 
		  $('#anim_edit').val(anim_add)
		  
            
            var fecha_add = button.data('fecha_add') 
		  $('#fecha_edit').val(fecha_add)
            
		   var id = button.data('id') 
		  $('#edit_id').val(id)
		})





		
		
		$('#deleteProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var id = button.data('id') 
		  $('#delete_id').val(id)
		})
		
		
		$( "#edit_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/sanitacion_ajax/editar_producto.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#editProductModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
		
		
		$( "#add_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/sanitacion_ajax/guardar_producto.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#addProductModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});


	
		$( "#delete_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/sanitacion_ajax/eliminar_producto.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#deleteProductModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});
