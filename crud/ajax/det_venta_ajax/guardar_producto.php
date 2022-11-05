<?php
	if (empty($_POST['fact_add'])){
		$errors[] = "Ingresa el numero de la factura.";
	} 
	elseif (!empty($_POST['fact_add'])){
	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) editor_nombre
    $fact = mysqli_real_escape_string($con,(strip_tags($_POST["fact_add"],ENT_QUOTES)));
    $prec = mysqli_real_escape_string($con,(strip_tags($_POST["prec_add"],ENT_QUOTES)));
    $id_peso = mysqli_real_escape_string($con,(strip_tags($_POST["peso_add"],ENT_QUOTES)));// solo agrega el id del peso
    $cat = mysqli_real_escape_string($con,(strip_tags($_POST["cat_add"],ENT_QUOTES)));
    $des = mysqli_real_escape_string($con,(strip_tags($_POST["des_add"],ENT_QUOTES)));
	$query2 =mysqli_query($con,"SELECT peso FROM pesaje WHERE id_pesaje = $id_peso");
	while($row = mysqli_fetch_array($query2)){	
		$peso=$row['peso'];}
	if ($des == '1'){
		$peso = $peso * 0.96;
	}
	$tot = $prec*$peso;

	// REGISTER data into database
    $sql = "INSERT INTO det_venta(id_det_venta,factura,precio_kilo,precio_total,id_categoria, id_pesaje) VALUES (NULL,'$fact','$prec','$tot','$cat','$id_peso')";
    $query = mysqli_query($con,$sql);
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