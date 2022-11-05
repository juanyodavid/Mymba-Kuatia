<?php
	if (empty($_POST['name'])){
		$errors[] = "Ingresa el nombre del producto.";
	} 
	elseif (!empty($_POST['name'])){
	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) editor_nombre
    $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["editor_nombre"],ENT_QUOTES)));
	$descripcion = mysqli_real_escape_string($con,(strip_tags($_POST["name"],ENT_QUOTES)));
	
	

	// REGISTER data into database
    $sql = "INSERT INTO raza(id_raza, nom_raza, desc_raza) VALUES (NULL,'$nombre','$descripcion')";
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "El producto ha sido guardado con éxito.";
    } 
		else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
    }
		
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
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>