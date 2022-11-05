<?php
	if (empty($_POST['id_add'])){
		$errors[] = "Ingresa el nombre del producto.";
	} 
	elseif (!empty($_POST['id_add'])){
	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) editor_nombre
    $animal = mysqli_real_escape_string($con,(strip_tags($_POST["id_add"],ENT_QUOTES)));
    $fuego = mysqli_real_escape_string($con,(strip_tags($_POST["fuego_add"],ENT_QUOTES)));
	$pelaje = mysqli_real_escape_string($con,(strip_tags($_POST["pelaje_add"],ENT_QUOTES)));
	$cuerno = mysqli_real_escape_string($con,(strip_tags($_POST["cuerno_add"],ENT_QUOTES)));
	$carimbo = mysqli_real_escape_string($con,(strip_tags($_POST["carimbo_add"],ENT_QUOTES)));
	$marca = mysqli_real_escape_string($con,(strip_tags($_POST["marca_add"],ENT_QUOTES)));
	$padre = mysqli_real_escape_string($con,(strip_tags($_POST["padre_add"],ENT_QUOTES)));
	$madre = mysqli_real_escape_string($con,(strip_tags($_POST["madre_add"],ENT_QUOTES)));
	$observacion = mysqli_real_escape_string($con,(strip_tags($_POST["observacion_add"],ENT_QUOTES)));
	$carne = mysqli_real_escape_string($con,(strip_tags($_POST["carne_add"],ENT_QUOTES)));
	$leche = mysqli_real_escape_string($con,(strip_tags($_POST["leche_add"],ENT_QUOTES)));
	$sexo = mysqli_real_escape_string($con,(strip_tags($_POST["sexo_add"],ENT_QUOTES)));
	$fecha = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_add"],ENT_QUOTES)));
	$estado = mysqli_real_escape_string($con,(strip_tags($_POST["estado_add"],ENT_QUOTES)));
	$raza = mysqli_real_escape_string($con,(strip_tags($_POST["raza_add"],ENT_QUOTES)));
	$foto = mysqli_real_escape_string($con,(strip_tags($_POST["foto_add"],ENT_QUOTES)));
	// REGISTER data into database
    $sql = "INSERT INTO principal(id_animal, hbp_fuego, id_pelaje, id_cuerno, id_raza, carimbo, id_marca, padre ,  madre ,  observacion ,  perfil_carnico ,  perfil_lechero ,  sexo ,  fecha_nac ,  estado ,  foto ) VALUES ('$animal','$fuego','$pelaje','$cuerno','$raza','$carimbo','$marca','$padre','$madre','$observacion','$carne','$leche','$sexo','$fecha','$estado','$foto')";    
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "Carga exitosa.";
    } 
		else {
        $errors[] = "Carga fallida.";    }
		
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
						<strong>Concretada</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>