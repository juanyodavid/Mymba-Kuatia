<?php
	if (empty($_POST['cria_add'])){
		$errors[] = "Ingresa el nombre del producto.";
	} 
	elseif (!empty($_POST['cria_add'])){
	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) editor_nombre
	$cria = mysqli_real_escape_string($con,(strip_tags($_POST["cria_add"],ENT_QUOTES)));
	$carimbo = mysqli_real_escape_string($con,(strip_tags($_POST["carimbo_add"],ENT_QUOTES)));
	$sexo = mysqli_real_escape_string($con,(strip_tags($_POST["sexo_add"],ENT_QUOTES)));
	$fecha = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_add"],ENT_QUOTES)));
	$obs = mysqli_real_escape_string($con,(strip_tags($_POST["observacion_add"],ENT_QUOTES)));
	$estado = mysqli_real_escape_string($con,(strip_tags($_POST["estado_add"],ENT_QUOTES)));
	$madre = mysqli_real_escape_string($con,(strip_tags($_POST["madre_add"],ENT_QUOTES)));
	$padre = mysqli_real_escape_string($con,(strip_tags($_POST["padre_add"],ENT_QUOTES)));
	$raza = mysqli_real_escape_string($con,(strip_tags($_POST["raza_add"],ENT_QUOTES)));
	$pelaje = mysqli_real_escape_string($con,(strip_tags($_POST["pelaje_add"],ENT_QUOTES)));
	

	// REGISTER data into database
    $sql = "INSERT INTO paricion(id_paricion, id_cria, carimbo_cria, sexo_cria, fecha_par, observ_paricion, estado, madre_id, padre_id, id_raza, id_pelaje) VALUES (NULL,'$cria','$carimbo','$sexo','$fecha','$obs','$estado','$madre','$padre','$raza','$pelaje')";
    $sql2 = "INSERT INTO principal(id_animal, id_pelaje, id_raza, carimbo, padre ,  madre ,  observacion ,  sexo ,  fecha_nac ,  estado, hbp_fuego,  perfil_carnico ,  perfil_lechero,id_cuerno) VALUES (
    								'$cria','$pelaje','$raza','$carimbo','$padre','$madre','$obs','$sexo','$fecha','$estado','0','0','0','1')";
    $query = mysqli_query($con,$sql);
    $query2 = mysqli_query($con,$sql2);
    // if product has been added successfully
    if ($query) {
        $messages[] = "Carga exitosa.";
    } 
		else {
        $errors[] = "Carga fallida.";        }
		
	} 
	 if ($query2) {
        $messages[] = "Carga exitosa en la tabla principal.";
    } 
		else {
        $errors[] = "Carga fallida en la tabla principal.";        }
		
	 
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