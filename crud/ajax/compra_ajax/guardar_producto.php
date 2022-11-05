<?php
	if (empty($_POST['cantidad_add'])){
		$errors[] = "Ingresa el nombre del producto.";
	} 
	elseif (!empty($_POST['cantidad_add'])){
	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) editor_nombre
    $cantidad = mysqli_real_escape_string($con,(strip_tags($_POST["cantidad_add"],ENT_QUOTES)));
	$pesok = mysqli_real_escape_string($con,(strip_tags($_POST["pesok_add"],ENT_QUOTES)));
	$precio = mysqli_real_escape_string($con,(strip_tags($_POST["precio_add"],ENT_QUOTES)));
	$total = mysqli_real_escape_string($con,(strip_tags($_POST["total_add"],ENT_QUOTES)));
	$fecha = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_add"],ENT_QUOTES)));
	

	// REGISTER data into database
    $sql = "INSERT INTO compra(id_compra, cantidad_compra, peso_compra, precio_kilo, valor_compra, fecha_compra) VALUES (NULL,'$cantidad','$pesok','$precio','$total','$fecha')";
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "Carga exitosa.";
    } 
		else {
        $errors[] = "Carga fallida.";        }
		
	} else 
	{
		$errors[] = "desconocido.";
	}
if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Concretada.</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>