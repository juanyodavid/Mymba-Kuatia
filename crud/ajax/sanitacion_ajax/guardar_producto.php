<?php
	if (empty($_POST['producto_add'])){
		$errors[] = "Ingresa el nombre del producto.";
	} 
	elseif (!empty($_POST['producto_add'])){
	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) editor_nombre
    $producto = mysqli_real_escape_string($con,(strip_tags($_POST["producto_add"],ENT_QUOTES)));
	$observacion = mysqli_real_escape_string($con,(strip_tags($_POST["obs_add"],ENT_QUOTES)));
	$fecha = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_add"],ENT_QUOTES)));
	$dosis = mysqli_real_escape_string($con,(strip_tags($_POST["dosis_add"],ENT_QUOTES)));
	$ind = mysqli_real_escape_string($con,(strip_tags($_POST["ind_add"],ENT_QUOTES)));
	$lote = mysqli_real_escape_string($con,(strip_tags($_POST["lote_add"],ENT_QUOTES)));
	
	
	 $cant  = mysqli_query($con,"SELECT * FROM ubicacion where `id_lote`= $lote ");

	 while($row = mysqli_fetch_array($cant)){
		 $anim=$row['id_animal'];

	//	 echo '<script language="javascript">alert('.$anim.');</script>';
		$sql = "INSERT INTO sanitacion(id_sanitacion, producto, fecha_sanit,obser_sanit, id_animal,indicacion,dosis) VALUES (NULL,'$producto','$fecha','$observacion','$anim','$ind','$dosis')";
   		$query = mysqli_query($con,$sql);
	 }
	// REGISTER data into database
    
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