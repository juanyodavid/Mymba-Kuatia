<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){
	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
  	$cria = mysqli_real_escape_string($con,(strip_tags($_POST["cria_edit"],ENT_QUOTES)));
	$carimbo = mysqli_real_escape_string($con,(strip_tags($_POST["carimbo_edit"],ENT_QUOTES)));
	$sexo = mysqli_real_escape_string($con,(strip_tags($_POST["sexo_edit"],ENT_QUOTES)));
	$fecha = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_edit"],ENT_QUOTES)));
	$obs = mysqli_real_escape_string($con,(strip_tags($_POST["observacion_edit"],ENT_QUOTES)));
	$estado = mysqli_real_escape_string($con,(strip_tags($_POST["estado_edit"],ENT_QUOTES)));
	$madre = mysqli_real_escape_string($con,(strip_tags($_POST["madre_edit"],ENT_QUOTES)));
	$padre = mysqli_real_escape_string($con,(strip_tags($_POST["padre_edit"],ENT_QUOTES)));
	$raza = mysqli_real_escape_string($con,(strip_tags($_POST["raza_edit"],ENT_QUOTES)));
	$pelaje = mysqli_real_escape_string($con,(strip_tags($_POST["pelaje_edit"],ENT_QUOTES)));
	$id=intval($_POST['edit_id']);
	// UPDATE data into database
    $sql = "UPDATE paricion SET id_cria='".$cria."',carimbo_cria='".$carimbo."',sexo_cria='".$sexo."',fecha_par='".$fecha."',observ_paricion='".$obs."',estado='".$estado."',madre_id='".$madre."',padre_id='".$padre."',id_raza='".$raza."',id_pelaje='".$pelaje."' WHERE id_paricion='".$id."' ";
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