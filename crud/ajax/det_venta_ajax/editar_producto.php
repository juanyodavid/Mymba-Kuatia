<?php
	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){
	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $fact = mysqli_real_escape_string($con,(strip_tags($_POST["fact_edit"],ENT_QUOTES)));
    $prec = mysqli_real_escape_string($con,(strip_tags($_POST["prec_edit"],ENT_QUOTES)));
    $id_peso = mysqli_real_escape_string($con,(strip_tags($_POST["peso_edit"],ENT_QUOTES)));// solo agrega el id del peso
    $cat = mysqli_real_escape_string($con,(strip_tags($_POST["cat_edit"],ENT_QUOTES)));
    $des = mysqli_real_escape_string($con,(strip_tags($_POST["des_edit"],ENT_QUOTES)));
	$query2 =mysqli_query($con,"SELECT peso FROM pesaje WHERE id_pesaje = $id_peso");
	while($row = mysqli_fetch_array($query2)){	
		$peso=$row['peso'];}
	if ($des == '1'){
		$peso = $peso * 0.96;
	}
	$tot = $prec*$peso;

	$id=intval($_POST['edit_id']);
	// UPDATE data into database
    $sql = "UPDATE det_venta SET factura='".$fact."',precio_kilo='".$prec."',precio_total='".$tot."',id_pesaje='".$id_peso."',id_categoria='".$cat."' WHERE id_det_venta='".$id."' ";
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