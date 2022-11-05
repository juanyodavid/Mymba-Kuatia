<?php
	if (empty($_POST['id_add'])){
		$errors[] = "Ingresa el nombre del producto.";
	} 
	elseif (!empty($_POST['id_add'])){
	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) editor_nombre
    $marca = mysqli_real_escape_string($con,(strip_tags($_POST["id_add"],ENT_QUOTES)));// estos "_ADD" vienen de modal_add.php
	$propietario = mysqli_real_escape_string($con,(strip_tags($_POST["propietario_add"],ENT_QUOTES)));
	$lugar = mysqli_real_escape_string($con,(strip_tags($_POST["lugar_add"],ENT_QUOTES)));
	$fecha = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_add"],ENT_QUOTES)));
	$diseno = mysqli_real_escape_string($con,(strip_tags($_POST["diseno_add"],ENT_QUOTES)));
	

	// REGISTER data into database
    $sql = "INSERT INTO marca(id_marca, propietario_marca,lugar_marca, fecha_marca, diseno_marca) VALUES ('$marca','$propietario','$lugar','$fecha','$diseno')";
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "Carga exitosa.";
    } 
		else {
        $errors[] = "Carga fallida.";    }
		
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
						<strong>Concretada</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>