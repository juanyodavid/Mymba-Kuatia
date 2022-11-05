<?php
	
	/* Connect To Database*/
require_once ("../../conexion.php");// conecta con la base de datos


// Esto evaluará a TRUE así que el texto se imprimirá.

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';// en la variable accion se pregunta si se realizo alguna accion
if($action == 'ajax'){
	$test = 'id_det_venta DESC';
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
    $tables="det_venta";
	$campos="*";
	$sWhere=" det_venta.factura LIKE '%".$query."%'"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere.=" order by det_venta.".$test;
	
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
						<th class='text-center'>Factura </th>  
						<th class='text-center'>N° de animal </th>  
						<th class='text-center'>Peso </th>  
						<th class='text-center'>Precio p/kg </th>  
						<th class='text-center'>Precio total </th>  
						<th class='text-center'>Categoría </th>  
						
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$fact=$row['factura'];
							$prec=$row['precio_kilo'];
							$tot=$row['precio_total'];
							$peso=$row['id_pesaje'];
							$cat=$row['id_categoria'];
							$id=$row['id_det_venta'];
							
												
							$finales++;
						?>	
						<tr >
							<td class='text-center'><?php echo $fact;?></td>
							<td class='text-center'><?php $query2 =mysqli_query($con,"SELECT * FROM `pesaje` WHERE `id_pesaje` = ".$peso."");
        						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['id_animal'] ;}?>	</td>
							<td class='text-center'><?php $query2 =mysqli_query($con,"SELECT * FROM `pesaje` WHERE `id_pesaje` = ".$peso."");
        						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['peso'] ;}?>	</td>
							
							<td class='text-center'><?php echo $prec;?></td>
							<td class='text-center'><?php echo $tot;?></td>
							<td class='text-center'><?php $query2 =mysqli_query($con,"SELECT * FROM `categoria` WHERE `id_categoria` = ".$cat."");
        						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['categoria'] ;}?>	</td>
							
							<td>
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-fact="<?php echo $fact?>" data-prec="<?php echo $prec?>"data-peso="<?php echo $peso?>"data-cat="<?php echo $cat?>"data-id="<?php echo $id;?>">
                                
                                <i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $id;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
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