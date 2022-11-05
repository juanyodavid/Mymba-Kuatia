<?php
	
	/* Connect To Database*/
require_once ("../../conexion.php");// conecta con la base de datos


// Esto evaluará a TRUE así que el texto se imprimirá.

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';// en la variable accion se pregunta si se realizo alguna accion
if($action == 'ajax'){
	
    	$test = 'id_evento';
    	// $orden="hola";

	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
    $tables="evento";
	$campos="*";
	$sWhere=" evento.id_animal LIKE '%".$query."%'"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere.=" order by evento.".$test;
	
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
						<th class='text-center'><a href="vista_usuario.php?orden="Holaaa""  >Id</a></th>  
						<th class='text-center'><a href="evento.php?orden="nombre_evento"" >Evento</a></th>
						<th class='text-center'><a href="evento.php?orden=observ_evento" >Id animal</a> </th>
						<th class='text-center'><a href="js/evento_script.js?orden=fecha_evento" >Fecha de evento</a> </th>
	
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$evento_id=$row['id_evento'];
							$nombre=$row['desc_evento'];
							$observacion=$row['id_animal'];
							$fecha=$row['fecha_evento'];						
							$finales++;
						?>	
						<tr >
							<td class='text-center'><?php echo $evento_id;?></td>
							<td class='text-center'><?php echo $nombre;?></td>
							<td class='text-center'><?php echo $observacion;?></td>
							<td class='text-center'><?php echo $fecha;?></td>
							
							<td>
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-evento_add="<?php echo $nombre?>" data-animal_add="<?php echo $observacion?>"data-fecha_add="<?php echo $fecha?>"data-id="<?php echo $evento_id;?>">
                                
                                <i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $evento_id;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
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