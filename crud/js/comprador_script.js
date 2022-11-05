$(function() {
			load(1);// este es el buscador de la variable
		});
		function load(page){// significa que se ejecuta al ser llamado este archivo ya que se ejecuta la funcion
			var query=$("#q").val(); // la variable "query" es el buscador y se llama #q (buscar en lote.php)
			var per_page=10; // declara esta variable con un valor de 10
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/comprador_ajax/vista_usuario.php ',
// <?php if (isset($_GET['var'])) {echo'ajax/lote_ajax/vista_usuario.php?var=4';} ?>
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
		  var nombre = button.data('nombre') 
		  $('#nombre_edit').val(nombre)
		  var ruc = button.data('ruc') 
		  $('#ruc_edit').val(ruc)
		  var cel = button.data('cel') 
		  $('#cel_edit').val(cel)
		  var obs= button.data('obs') 
		  $('#obs_edit').val(obs)
		  var dir= button.data('dir') 
		  $('#dir_edit').val(dir)
		  
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
					url: "ajax/comprador_ajax/editar_producto.php",
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
					url: "ajax/comprador_ajax/guardar_producto.php",
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
					url: "ajax/comprador_ajax/eliminar_producto.php",
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
