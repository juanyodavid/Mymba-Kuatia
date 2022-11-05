<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){
	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
	$propietario = mysqli_real_escape_string($con,(strip_tags($_POST["propietario_edit"],ENT_QUOTES)));
	$lugar = mysqli_real_escape_string($con,(strip_tags($_POST["lugar_edit"],ENT_QUOTES)));
	$fecha = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_edit"],ENT_QUOTES)));
	$diseno = mysqli_real_escape_string($con,(strip_tags($_POST["diseno_edit"],ENT_QUOTES)));
	$ide = mysqli_real_escape_string($con,(strip_tags($_POST["edit_id2"],ENT_QUOTES)));
	$id = mysqli_real_escape_string($con,(strip_tags($_POST["edit_id"],ENT_QUOTES)));
	// $id=intval($_POST['edit_id2']);
	// echo '<script language="javascript">alert("'.$ide.'");</script>'; me envia una alerta con el valor de $ide 

	// UPDATE data into database
    $sql = "UPDATE marca SET id_marca='".$id."',propietario_marca='".$propietario."',lugar_marca='".$lugar."',fecha_marca='".$fecha."',diseno_marca='".$diseno."' WHERE id_marca='".$ide."' ";
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