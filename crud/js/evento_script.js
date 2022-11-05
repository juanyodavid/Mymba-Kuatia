$(function() {
			load(1);// este es el buscador de la variable
		});
		function load(page){// significa que se ejecuta al ser llamado este archivo ya que se ejecuta la funcion
			var query=$("#q").val(); // la variable "query" es el buscador y se llama #q (buscar en evento.php)
			var per_page=10; // declara esta variable con un valor de 10
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/evento_ajax/vista_usuario.php',
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
		  var evento_add = button.data('evento_add') // crea la variable evento_add y la informacion lo guarda en el boton.data (evento_ADD)
		  $('#evento_edit').val(evento_add) //al editar en la posicion de evento add va a aparecer la que se cargo en evento_add
            // esto mismo sucede con las otras variables por eso no funcionaba fecha
		  var animal_add = button.data('animal_add') 
		  $('#animal_edit').val(animal_add)
            
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
					url: "ajax/evento_ajax/editar_producto.php",
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
					url: "ajax/evento_ajax/guardar_producto.php",
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
					url: "ajax/evento_ajax/eliminar_producto.php",
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
