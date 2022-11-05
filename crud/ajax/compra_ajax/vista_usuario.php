<?php
	
	/* Connect To Database*/
require_once ("../../conexion.php");// conecta con la base de datos


// Esto evaluará a TRUE así que el texto se imprimirá.
if (isset($_GET['var'])) {
    $test='nombre_compra';
    echo "hola";
}
 else {
    $test = 'fecha_compra DESC';
}
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';// en la variable accion se pregunta si se realizo alguna accion
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
    
    


	$tables="compra";
	$campos="*";
	$sWhere=" compra.cantidad_compra LIKE '%".$query."%'"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere.=" order by compra.".$test;
	
	
	
	include '../pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);
	//main query to fetch the data
	$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data
	if ($numrows>0){
		
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class='text-center'><a href="id.php?var=4" >Id</a></th>  
						<th class='text-center'><a href="lote.php?orden=nombre_lote" >Cantidad</a></th>
						<th class='text-center'><a href="lote.php?orden=nombre_lote" >Peso de compra</a></th>
						<th class='text-center'><a href="lote.php?orden=observ_lote" >Precio por kilo</a> </th>
						<th class='text-center'><a href="lote.php?orden=observ_lote" >Suma total</a> </th>
						<th class='text-center'><a href="js/lote_script.js?orden=fecha_lote" >Fecha </a> </th>
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$compra_id=$row['id_compra'];
							$nombre=$row['cantidad_compra'];
							$peso=$row['peso_compra'];
							$observacion=$row['precio_kilo'];
							$valor=$row['valor_compra'];
							$fecha=$row['fecha_compra'];						
							$finales++;
						?>	
						<tr >
							<td class='text-center'><?php echo $compra_id;?></td>
							<td class='text-center'><?php echo $nombre;?></td>
							<td class='text-center'><?php echo $peso;?></td>
							<td class='text-center'><?php echo $observacion;?></td>
							<td class='text-center'><?php echo $valor;?></td>
							<td class='text-center'><?php echo $fecha;?></td>
							
							<td>
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-cantidad_add="<?php echo $nombre?>" data-pesok_add="<?php echo $peso?>" data-precio_add="<?php echo $observacion?>"data-total_add="<?php echo $valor?>"data-fecha_add="<?php echo $fecha?>"data-id="<?php echo $compra_id;?>">
                                
                                <i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $compra_id;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                    		</td>	
						</tr>
						<?php }?>
						<tr>
							<td colspan='7'> 
								<?php 
									$inicios=$offset+1;
									$finales+=$inicios -1;
									echo "Mostrando $inicios al $finales de $numrows registros";
									echo paginate( $page, $total_pages, $adjacents);
								?>
							</td>
						</tr>
				</tbody>			
			</table>
		</div>	

	
	
	<?php	
	}	
}
?>          