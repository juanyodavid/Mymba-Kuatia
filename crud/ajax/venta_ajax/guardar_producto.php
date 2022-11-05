<?php
	if (empty($_POST['fact_add'])){
		$errors[] = "Ingresa el nombre del producto.";
	} 
	elseif (!empty($_POST['fact_add'])){
	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) editor_nombre
    $fact = mysqli_real_escape_string($con,(strip_tags($_POST["fact_add"],ENT_QUOTES)));
	$obs = mysqli_real_escape_string($con,(strip_tags($_POST["obs_add"],ENT_QUOTES)));
	$comp = mysqli_real_escape_string($con,(strip_tags($_POST["comp_add"],ENT_QUOTES)));
	$fecha = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_add"],ENT_QUOTES)));
	
	// $query1 = mysqli_query($con,"SELECT COUNT(DISTINCT id_categoria) as cant FROM det_venta where factura = $fact ");
	// if ($row= mysqli_fetch_array($query1)){$i = $row['cant'];}

	$vaca = mysqli_query($con,"SELECT COUNT( id_categoria) as cant FROM det_venta where factura = $fact and id_categoria = 1 ORDER BY factura,id_categoria ");
	if ($row= mysqli_fetch_array($vaca)){$r1 = $row['cant'];}
	$vaquilla = mysqli_query($con,"SELECT COUNT( id_categoria) as cant FROM det_venta where factura = $fact and id_categoria = 2 ORDER BY factura,id_categoria ");
	if ($row= mysqli_fetch_array($vaquilla)){$r2 = $row['cant'];}
	// echo '<script language="javascript">alert('.$r2.');</script>';

	$novillo = mysqli_query($con,"SELECT COUNT( id_categoria) as cant FROM det_venta where factura = $fact and id_categoria = 3 ORDER BY factura,id_categoria ");
	if ($row= mysqli_fetch_array($novillo)){$r3 = $row['cant'];}
	$toro = mysqli_query($con,"SELECT COUNT( id_categoria) as cant FROM det_venta where factura = $fact and id_categoria = 4 ORDER BY factura,id_categoria ");
	if ($row= mysqli_fetch_array($toro)){$r4 = $row['cant'];}
	$d_macho = mysqli_query($con,"SELECT COUNT( id_categoria) as cant FROM det_venta where factura = $fact and id_categoria = 5 ORDER BY factura,id_categoria ");
	if ($row= mysqli_fetch_array($d_macho)){$r5 = $row['cant'];}
	$d_hembra = mysqli_query($con,"SELECT COUNT( id_categoria) as cant FROM det_venta where factura = $fact and id_categoria = 6 ORDER BY factura,id_categoria ");
	if ($row= mysqli_fetch_array($d_hembra)){$r6 = $row['cant'];}
	$t_macho = mysqli_query($con,"SELECT COUNT( id_categoria) as cant FROM det_venta where factura = $fact and id_categoria = 7 ORDER BY factura,id_categoria ");
	if ($row= mysqli_fetch_array($t_macho)){$r7 = $row['cant'];}
	$t_hembra = mysqli_query($con,"SELECT COUNT( id_categoria) as cant FROM det_venta where factura = $fact and id_categoria = 8 ORDER BY factura,id_categoria ");
	if ($row= mysqli_fetch_array($t_hembra)){$r8 = $row['cant'];}
	$vaca = mysqli_query($con,"SELECT COUNT( id_categoria) as cant FROM det_venta where factura = $fact and id_categoria = 9 ORDER BY factura,id_categoria ");
	if ($row= mysqli_fetch_array($vaca)){$r9 = $row['cant'];}
		 

	if ($r1 > 0){
		$tot = 0;
		$query1 = mysqli_query($con,"SELECT precio_total,precio_kilo FROM det_venta where factura = $fact and id_categoria = 1 ORDER BY factura,id_categoria ");
		while ($row= mysqli_fetch_array($query1)){
			$t = $row['precio_total'];
			$k = $row['precio_kilo'];
			$tot += $t;}
		$sql = "INSERT INTO venta(id_venta, factura, cant_cat, prec_tot,prec_unit,obs,fecha,id_comprador,id_categoria) VALUES (NULL,'$fact','$r1','$tot','$k','$obs','$fecha','$comp',1)";
			$query = mysqli_query($con,$sql);
	}
	if ($r2 > 0){
		$tot = 0;
		$query2 = mysqli_query($con,"SELECT precio_total,precio_kilo FROM det_venta where factura = $fact and id_categoria = 2 ORDER BY factura,id_categoria ");
		while ($row= mysqli_fetch_array($query2)){
			$t = $row['precio_total'];
			$k = $row['precio_kilo'];
			$tot += $t;}
		$sql = "INSERT INTO venta(id_venta, factura, cant_cat, prec_tot,prec_unit,obs,fecha,id_comprador,id_categoria) VALUES (NULL,'$fact','$r2','$tot','$k','$obs','$fecha','$comp',2)";
			$query = mysqli_query($con,$sql);
	}
	if ($r3 > 0){
		$tot = 0;
		$query3 = mysqli_query($con,"SELECT precio_total,precio_kilo FROM det_venta where factura = $fact and id_categoria = 3 ORDER BY factura,id_categoria ");
		while ($row= mysqli_fetch_array($query3)){
			$t = $row['precio_total'];
			$k = $row['precio_kilo'];
			$tot += $t;}
		$sql = "INSERT INTO venta(id_venta, factura, cant_cat, prec_tot,prec_unit,obs,fecha,id_comprador,id_categoria) VALUES (NULL,'$fact','$r3','$tot','$k','$obs','$fecha','$comp',3)";
			$query = mysqli_query($con,$sql);
	}
	if ($r4 > 0){
		$tot = 0;
		$query4 = mysqli_query($con,"SELECT precio_total,precio_kilo FROM det_venta where factura = $fact and id_categoria = 4 ORDER BY factura,id_categoria ");
		while ($row= mysqli_fetch_array($query4)){
			$t = $row['precio_total'];
			$k = $row['precio_kilo'];
			$tot += $t;}
		$sql = "INSERT INTO venta(id_venta, factura, cant_cat, prec_tot,prec_unit,obs,fecha,id_comprador,id_categoria) VALUES (NULL,'$fact','$r4','$tot','$k','$obs','$fecha','$comp',4)";
			$query = mysqli_query($con,$sql);
	}
	if ($r5 > 0){
		$tot = 0;
		$query5 = mysqli_query($con,"SELECT precio_total,precio_kilo FROM det_venta where factura = $fact and id_categoria = 5 ORDER BY factura,id_categoria ");
		while ($row= mysqli_fetch_array($query5)){
			$t = $row['precio_total'];
			$k = $row['precio_kilo'];
			$tot += $t;}
		$sql = "INSERT INTO venta(id_venta, factura, cant_cat, prec_tot,prec_unit,obs,fecha,id_comprador,id_categoria) VALUES (NULL,'$fact','$r5','$tot','$k','$obs','$fecha','$comp',5)";
			$query = mysqli_query($con,$sql);
	}
	if ($r6 > 0){
		$tot = 0;
		$query6 = mysqli_query($con,"SELECT precio_total,precio_kilo FROM det_venta where factura = $fact and id_categoria = 6 ORDER BY factura,id_categoria ");
		while ($row= mysqli_fetch_array($query6)){
			$t = $row['precio_total'];
			$k = $row['precio_kilo'];
			$tot += $t;}
		$sql = "INSERT INTO venta(id_venta, factura, cant_cat, prec_tot,prec_unit,obs,fecha,id_comprador,id_categoria) VALUES (NULL,'$fact','$r6','$tot','$k','$obs','$fecha','$comp',6)";
			$query = mysqli_query($con,$sql);
	}
	if ($r7 > 0){
		$tot = 0;
		$query7 = mysqli_query($con,"SELECT precio_total,precio_kilo FROM det_venta where factura = $fact and id_categoria = 7 ORDER BY factura,id_categoria ");
		while ($row= mysqli_fetch_array($query7)){
			$t = $row['precio_total'];
			$k = $row['precio_kilo'];
			$tot += $t;}
		$sql = "INSERT INTO venta(id_venta, factura, cant_cat, prec_tot,prec_unit,obs,fecha,id_comprador,id_categoria) VALUES (NULL,'$fact','$r7','$tot','$k','$obs','$fecha','$comp',7)";
			$query = mysqli_query($con,$sql);
	}
	if ($r8 > 0){
		$tot = 0;
		$query8 = mysqli_query($con,"SELECT precio_total,precio_kilo FROM det_venta where factura = $fact and id_categoria = 8 ORDER BY factura,id_categoria ");
		while ($row= mysqli_fetch_array($query8)){
			$t = $row['precio_total'];
			$k = $row['precio_kilo'];
			$tot += $t;}
		$sql = "INSERT INTO venta(id_venta, factura, cant_cat, prec_tot,prec_unit,obs,fecha,id_comprador,id_categoria) VALUES (NULL,'$fact','$r8','$tot','$k','$obs','$fecha','$comp',8)";
			$query = mysqli_query($con,$sql);
	}
	if ($r9 > 0){
		$tot = 0;
		$query9 = mysqli_query($con,"SELECT precio_total,precio_kilo FROM det_venta where factura = $fact and id_categoria = 9 ORDER BY factura,id_categoria ");
		while ($row= mysqli_fetch_array($query9)){
			$t = $row['precio_total'];
			$k = $row['precio_kilo'];
			$tot += $t;}
		$sql = "INSERT INTO venta(id_venta, factura, cant_cat, prec_tot,prec_unit,obs,fecha,id_comprador,id_categoria) VALUES (NULL,'$fact','$r9','$tot','$k','$obs','$fecha','$comp',9)";
			$query = mysqli_query($con,$sql);
	}


	// REGISTER data into database
 
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