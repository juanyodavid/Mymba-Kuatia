<?php
	
	/* Connect To Database*/
	require_once ("../../conexion.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="potrero";
	$campos="*";
	$sWhere=" potrero.nombre_pot LIKE '%".$query."%'";
	$sWhere.=" order by potrero.id_potrero";
	
	
	
	include '../pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
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
						<th class='text-center'>Id</th>  
						<th class='text-center'>Potrero </th>
						<th class='text-center'>Tamaño (has.)</th>
						<th class='text-center'>Área útil (%) </th>
						<th class='text-center'>Descripción </th>
                        <th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$product_id=$row['id_potrero'];
							$nombre=$row['nombre_pot'];
							$tam=$row['tamanho'];
							$area=$row['putil'];
							$prod_name=$row['desc_pot'];
													
							$finales++;
						?>	
						<tr >
							<td class='text-center'><?php echo $product_id;?></td>
							<td class='text-center'><?php echo $nombre;?></td>
							<td class='text-center'><?php echo $tam;?></td>
							<td class='text-center'><?php echo $area;?></td>
							<td class='text-center'><?php echo $prod_name;?></td>
							
							<td>
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-nombre_add='<?php echo $nombre;?>'data-tam_add='<?php echo $tam;?>'data-area_add='<?php echo $area;?>' data-name="<?php echo $prod_name?>"data-id="<?php echo $product_id;?>">
                                
                                <i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
                                <a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $product_id;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                    		</td>
							
							
							
							 
							
							
						</tr>
						<?php }?>
						<tr>
							<td colspan='6'> 
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