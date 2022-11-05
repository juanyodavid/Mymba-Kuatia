$(function() {
			load(1);// este es el buscador de la variable
		});
		function load(page){
			var query=$("#q").val();
			var per_page=10;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/principal_ajax/vista_usuario.php',
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
		  var id_add = button.data('id_add') 
		  $('#edit_id').val(id_add)

		 	var id_add2 = button.data('id_add') 
		  $('#edit_id2').val(id_add)

            var fuego_add = button.data('fuego_add') // crea la variable lote_edit
		  $('#fuego_edit').val(fuego_add)


            var pelaje_add = button.data('pelaje_add') 
		  $('#pelaje_edit').val(pelaje_add)
             var cuerno_add = button.data('cuerno_add') 
		  $('#cuerno_edit').val(cuerno_add)
             var carimbo_add = button.data('carimbo_add') 
		  $('#carimbo_edit').val(carimbo_add)
             var marca_add = button.data('marca_add') 
		  $('#marca_edit').val(marca_add)
             var padre_add = button.data('padre_add') 
		  $('#padre_edit').val(padre_add)
	             var madre_add = button.data('madre_add')
		  $('#madre_edit').val(madre_add)
             var observacion_add = button.data('observacion_add') 
		  $('#observacion_edit').val(observacion_add)
             var carne_add = button.data('carne_add') 
		  $('#carne_edit').val(carne_add)
             var leche_add = button.data('leche_add') 
		  $('#leche_edit').val(leche_add)
             var  sexo_add = button.data('sexo_add') 
		  $('#sexo_edit').val(sexo_add)
             var fecha_add = button.data('fecha_add') 
		  $('#fecha_edit').val(fecha_add)
             var estado_add = button.data('estado_add') 
		  $('#estado_edit').val(estado_add)
            var raza_add = button.data('raza_add') 
		  $('#raza_edit').val(raza_add)
            var foto_add = button.data('foto_add') 
		    $('#foto_edit').val(foto_add)
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
					url: "ajax/principal_ajax/editar_producto.php",
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
					url: "ajax/principal_ajax/guardar_producto.php",
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
					url: "ajax/principal_ajax/eliminar_producto.php",
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