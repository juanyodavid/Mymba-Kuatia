<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){
	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $producto = mysqli_real_escape_string($con,(strip_tags($_POST["producto_edit"],ENT_QUOTES)));
    $dosis = mysqli_real_escape_string($con,(strip_tags($_POST["dosis_edit"],ENT_QUOTES)));
    $indicacion = mysqli_real_escape_string($con,(strip_tags($_POST["indicacion_edit"],ENT_QUOTES)));
	$observacion = mysqli_real_escape_string($con,(strip_tags($_POST["observacion_edit"],ENT_QUOTES)));
    $fecha = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_edit"],ENT_QUOTES)));
	$id=intval($_POST['edit_id']);
	// UPDATE data into database
    $sql = "UPDATE vacunacion SET producto='".$producto."',dosis='".$dosis."',indicacion='".$indicacion."',observacion='".$observacion."',fecha_vacunacion='".$fecha."' WHERE id_vacunacion='".$id."' ";
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