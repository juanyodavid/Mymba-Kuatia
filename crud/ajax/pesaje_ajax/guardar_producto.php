<?php
	if (empty($_POST['anim_add'])){
		$errors[] = "Error al guardar";
	} 
	elseif (!empty($_POST['anim_add'])){
	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) editor_nombre
 	$peso = mysqli_real_escape_string($con,(strip_tags($_POST["peso_add"],ENT_QUOTES)));
	$animal = mysqli_real_escape_string($con,(strip_tags($_POST["anim_add"],ENT_QUOTES)));
	$fecha = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_add"],ENT_QUOTES)));
	

	// REGISTER data into database
    $sql = "INSERT INTO pesaje(id_pesaje, peso, id_animal, fecha_pesaje) VALUES (NULL,'$peso','$animal','$fecha')";
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