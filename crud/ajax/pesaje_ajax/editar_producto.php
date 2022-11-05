<?php
if (empty($_POST['edit_id'])){
	$errors[] = "ID está vacío.";
} elseif (!empty($_POST['edit_id'])){
require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
// escaping, additionally removing everything that could be (html/javascript-) code
 $peso = mysqli_real_escape_string($con,(strip_tags($_POST["peso_edit"],ENT_QUOTES)));
$animal = mysqli_real_escape_string($con,(strip_tags($_POST["anim_edit"],ENT_QUOTES)));
$fecha = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_edit"],ENT_QUOTES)));
$id=intval($_POST['edit_id']);

// REGISTER data into database
$sql = "UPDATE pesaje SET  peso='".$peso."', id_animal='".$animal."', fecha_pesaje='".$fecha."' WHERE id_pesaje = '".$id."' ";
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