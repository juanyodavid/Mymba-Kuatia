<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){
	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $cantidad = mysqli_real_escape_string($con,(strip_tags($_POST["cantidad_edit"],ENT_QUOTES)));
	$pesok = mysqli_real_escape_string($con,(strip_tags($_POST["pesok_edit"],ENT_QUOTES)));
	$precio = mysqli_real_escape_string($con,(strip_tags($_POST["precio_edit"],ENT_QUOTES)));
	$total = mysqli_real_escape_string($con,(strip_tags($_POST["total_edit"],ENT_QUOTES)));
    $fecha = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_edit"],ENT_QUOTES)));
	$id=intval($_POST['edit_id']);
	// UPDATE data into database
    $sql = "UPDATE venta SET cantidad_venta='".$cantidad."',peso_venta='".$pesok."',precio_kilo='".$precio."',valor_venta='".$total."',fecha_venta='".$fecha."' WHERE id_venta='".$id."' ";
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "Actualización exitosa.";
    } else {
        $errors[] = "Actualización fallida.";
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