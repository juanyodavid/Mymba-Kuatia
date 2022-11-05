<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){
	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
	$fuego = mysqli_real_escape_string($con,(strip_tags($_POST["fuego_edit"],ENT_QUOTES)));
	$pelaje = mysqli_real_escape_string($con,(strip_tags($_POST["pelaje_edit"],ENT_QUOTES)));
	$cuerno = mysqli_real_escape_string($con,(strip_tags($_POST["cuerno_edit"],ENT_QUOTES)));
	$carimbo = mysqli_real_escape_string($con,(strip_tags($_POST["carimbo_edit"],ENT_QUOTES)));
	$marca = mysqli_real_escape_string($con,(strip_tags($_POST["marca_edit"],ENT_QUOTES)));
	$padre = mysqli_real_escape_string($con,(strip_tags($_POST["padre_edit"],ENT_QUOTES)));
	$madre = mysqli_real_escape_string($con,(strip_tags($_POST["madre_edit"],ENT_QUOTES)));
	$observacion = mysqli_real_escape_string($con,(strip_tags($_POST["observacion_edit"],ENT_QUOTES)));
	$carne = mysqli_real_escape_string($con,(strip_tags($_POST["carne_edit"],ENT_QUOTES)));
	$leche = mysqli_real_escape_string($con,(strip_tags($_POST["leche_edit"],ENT_QUOTES)));
	$sexo = mysqli_real_escape_string($con,(strip_tags($_POST["sexo_edit"],ENT_QUOTES)));
	$fecha = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_edit"],ENT_QUOTES)));
	$estado = mysqli_real_escape_string($con,(strip_tags($_POST["estado_edit"],ENT_QUOTES)));
	$raza = mysqli_real_escape_string($con,(strip_tags($_POST["raza_edit"],ENT_QUOTES)));
	$foto = mysqli_real_escape_string($con,(strip_tags($_POST["foto_edit"],ENT_QUOTES)));
	$id=mysqli_real_escape_string($con,(strip_tags($_POST["edit_id"],ENT_QUOTES)));
	$ide=mysqli_real_escape_string($con,(strip_tags($_POST["edit_id2"],ENT_QUOTES)));
	// UPDATE data into database
    $sql = "UPDATE principal SET id_animal='".$id."',hbp_fuego='".$fuego."',id_pelaje='".$pelaje."',id_cuerno='".$cuerno."',carimbo='".$carimbo."',id_raza='".$raza."',id_marca='".$marca."',padre='".$padre."',madre='".$madre."',observacion='".$observacion."',perfil_carnico='".$carne."',perfil_lechero='".$leche."',sexo='".$sexo."',fecha_nac='".$fecha."',estado='".$estado."',foto='".$foto."' WHERE id_animal='".$ide."' ";
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