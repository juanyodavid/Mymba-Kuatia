<?php
	
	/* Connect To Database*/
require_once ("../../conexion.php");// conecta con la base de datos


$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';// en la variable accion se pregunta si se realizo alguna accion
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
    $test = 'id_comprador DESC';
	$tables="comprador";
	$campos="*";
	$sWhere=" comprador.nombre LIKE '%".$query."%'"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere.=" order by comprador.".$test;
	
	
	
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
						<th > </th>  
						<th class='text-center'>Id</th>  
						<th class='text-center'>Nombre</th>  
						<th class='text-center'>Ruc</th>  
						<th class='text-center'>Celular</th>  
						<th class='text-center'>Dirección</th>  
						<th class='text-center'>Observación</th>  
						
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$id=$row['id_comprador'];
							$name=$row['nombre'];
							$ruc=$row['ruc'];
							$cel=$row['celular'];
							$dir=$row['direccion'];
							$obs=$row['obs'];
							
												
							$finales++;
						?>	
						<tr >
						<th > </th>  

							<td class='text-center'><?php echo $id;?></td>
							<td class='text-center'><?php echo $name;?></td>
							<td class='text-center'><?php echo $ruc;?></td>
							<td class='text-center'><?php echo $cel;?></td>
							<td class='text-center'><?php echo $dir;?></td>
							<td class='text-center'><?php echo $obs;?></td>
							
							<td>
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-nombre="<?php echo $name?>"data-ruc="<?php echo $ruc?>"
								data-cel="<?php echo $cel?>"data-dir="<?php echo $dir?>"data-obs="<?php echo $obs?>" data-id="<?php echo $id;?>">
                                <i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
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