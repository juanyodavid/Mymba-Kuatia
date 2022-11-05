<?php
	if (empty($_POST['name'])){
		$errors[] = "Ingresa el nombre del producto.";
	} 
	elseif (!empty($_POST['name'])){
	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) editor_nombre
    $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre_add"],ENT_QUOTES)));
    $tam = mysqli_real_escape_string($con,(strip_tags($_POST["tam_add"],ENT_QUOTES)));
    $area = mysqli_real_escape_string($con,(strip_tags($_POST["area_add"],ENT_QUOTES)));
	$descripcion = mysqli_real_escape_string($con,(strip_tags($_POST["name"],ENT_QUOTES)));
	
	

	// REGISTER data into database
    $sql = "INSERT INTO potrero(id_potrero, nombre_pot,tamanho, putil, desc_pot) VALUES (NULL,'$nombre','$tam','$area','$descripcion')";
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