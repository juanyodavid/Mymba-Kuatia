<?php
	if (empty($_POST['nombre_add'])){
		$errors[] = "Ingresa el nombre del producto.";
	} 
	elseif (!empty($_POST['nombre_add'])){
	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) editor_nombre
    $name = mysqli_real_escape_string($con,(strip_tags($_POST["nombre_add"],ENT_QUOTES)));
    $ruc = mysqli_real_escape_string($con,(strip_tags($_POST["ruc_add"],ENT_QUOTES)));
    $cel = mysqli_real_escape_string($con,(strip_tags($_POST["cel_add"],ENT_QUOTES)));
    $dir = mysqli_real_escape_string($con,(strip_tags($_POST["dir_add"],ENT_QUOTES)));
    $obs = mysqli_real_escape_string($con,(strip_tags($_POST["obs_add"],ENT_QUOTES)));

	// REGISTER data into database
    $sql = "INSERT INTO comprador(id_comprador,nombre,ruc,celular,direccion,obs) VALUES (NULL,'$name','$ruc','$cel','$dir','$obs')";
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