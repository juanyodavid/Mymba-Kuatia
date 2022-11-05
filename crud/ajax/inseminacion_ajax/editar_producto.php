<?php
if (empty($_POST['edit_id'])){
	$errors[] = "ID está vacío.";
} elseif (!empty($_POST['edit_id'])){
require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
// escaping, additionally removing everything that could be (html/javascript-) code
$madre = mysqli_real_escape_string($con,(strip_tags($_POST["madre_edit"],ENT_QUOTES)));
$padre = mysqli_real_escape_string($con,(strip_tags($_POST["padre_edit"],ENT_QUOTES)));
$obs = mysqli_real_escape_string($con,(strip_tags($_POST["obs_edit"],ENT_QUOTES)));
$fecha = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_edit"],ENT_QUOTES)));
$id=intval($_POST['edit_id']);

// REGISTER data into database
$sql = "UPDATE inseminacion SET obs='".$obs."', madre_id='".$madre."', padre_id='".$padre."', fecha_servicio='".$fecha."' WHERE id_inseminacion = '".$id."' ";
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