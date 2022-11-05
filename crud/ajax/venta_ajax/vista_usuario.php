<?php
	
	/* Connect To Database*/
require_once ("../../conexion.php");// conecta con la base de datos
  
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';// en la variable accion se pregunta si se realizo alguna accion
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
    $test = 'fecha';
   	$tables="venta";
	$campos="*";
	$sWhere=" venta.factura LIKE '%".$query."%'"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere.=" order by venta.fecha DESC";
	
	
	
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
						<th class='text-center'>Id de venta</th>  
						<th class='text-center'>N° de factura</th>
						<th class='text-center'>Nombre cat.</th>
						<th class='text-center'>Animales</th>
						<th class='text-center'>Suma total </th>
						<th class='text-center'>Precio unitario </th>
						<th class='text-center'>Obs </th>
						<th class='text-center'>Comprador </th>
						<th class='text-center'>Fecha</th>
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$id=$row['id_venta'];
							$fact=$row['factura'];
							$cant=$row['cant_cat'];
							$tot=$row['prec_tot'];
							$unit=$row['prec_unit'];
							$obs=$row['obs'];
							$fecha=$row['fecha'];
							$comp=$row['id_comprador'];
							$cat=$row['id_categoria'];
											
							$finales++;
						?>	
						<tr >
							<td class='text-center'><?php echo $id;?></td>
							<td class='text-center'><?php echo $fact;?></td>
							<td class='text-center'><?php $query2 =mysqli_query($con,"SELECT `categoria` FROM `categoria` WHERE `id_categoria` = ".$cat."");
        						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['categoria'] ;}?>	</td>
							<td class='text-center'><?php echo $cant;?></td>
							<td class='text-center'><?php echo $tot;?></td>
							<td class='text-center'><?php echo $unit;?></td>
							<td class='text-center'><?php echo $obs;?></td>
							<td class='text-center'><?php $query2 =mysqli_query($con,"SELECT `nombre` FROM `comprador` WHERE `id_comprador` = ".$comp."");
        						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['nombre'] ;}?>	</td>
							
							<td class='text-center'><?php echo $fecha;?></td>
						
							
							 <td>
							<!--	<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-cantidad_add="<?php echo $nombre?>" data-pesok_add="<?php echo $peso?>" data-precio_add="<?php echo $observacion?>"data-total_add="<?php echo $valor?>"data-fecha_add="<?php echo $fecha?>"data-id="<?php echo $venta_id;?>">
                                
                                <i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>-->
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $id;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                    		</td>	 
						</tr>
						<?php }?>
						<tr>
							<td colspan='12'> 
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