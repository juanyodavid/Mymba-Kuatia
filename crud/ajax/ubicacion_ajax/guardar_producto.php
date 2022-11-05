<?php
	if (empty($_POST['anim_add'])){
		$errors[] = "Ingresa el nombre del producto.";
	} 
	elseif (!empty($_POST['anim_add'])){
	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) editor_nombre
 	$lote = mysqli_real_escape_string($con,(strip_tags($_POST["lote_add"],ENT_QUOTES)));
	$animal = mysqli_real_escape_string($con,(strip_tags($_POST["anim_add"],ENT_QUOTES)));
	$fecha = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_add"],ENT_QUOTES)));
	$potrero = mysqli_real_escape_string($con,(strip_tags($_POST["potrero_add"],ENT_QUOTES)));
	$obs = mysqli_real_escape_string($con,(strip_tags($_POST["obs_add"],ENT_QUOTES)));
	

	// REGISTER data into database
    $sql = "INSERT INTO ubicacion(id_lote, id_potrero,id_animal, fecha_entrada, observacion_ubic) VALUES ('$lote','$potrero','$animal','$fecha','$obs')";
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