<?php
	
	/* Connect To Database*/
require_once ("../../conexion.php");// conecta con la base de datos

$test = 'id_inseminacion';
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';// en la variable accion se pregunta si se realizo alguna accion
if($action == 'ajax'){
$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
    
    


	$tables="inseminacion";
	$campos="*";
	$sWhere=" inseminacion.id_inseminacion LIKE '%".$query."%'"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere.=" order by inseminacion.".$test;
	
	
	
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
						<th class='text-center'>Id</a></th>  
						<th class='text-center'>Fecha de inseminacion</a> </th>
						<th class='text-center'>Madre</a></th>
						<th class='text-center'>Padre</a></th>
						<th class='text-center'>Observación</a> </th>
			
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$inseminacion_id=$row['id_inseminacion'];
							$fecha=$row['fecha_servicio'];						
							$madre=$row['madre_id'];
							$padre=$row['padre_id'];
							$obs=$row['obs'];
							$finales++;
						?>	
						<tr >
							<td class='text-center'><?php echo $inseminacion_id;?></td>
							<td class='text-center'><?php echo $fecha;?></td>
							<td class='text-center'><?php $query2 =mysqli_query($con,"SELECT * FROM `principal` WHERE `id_animal` = ".$madre."");
        						 while ($valores = mysqli_fetch_array($query2)) {echo $madre."-".$valores['sexo']."-"."C: ".$valores['carimbo'] ;}?>	</td>
							<td class='text-center'><?php $query2 =mysqli_query($con,"SELECT * FROM `principal` WHERE `id_animal` = ".$padre."");
        						 while ($valores = mysqli_fetch_array($query2)) {echo $padre."-".$valores['sexo']."-"."C: ".$valores['carimbo'] ;}?>	</td>
							<td class='text-center'><?php echo $obs;?></td>
							<td>
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-id="<?php echo $inseminacion_id;?>"data-fecha_add="<?php echo $fecha?>" data-madre_add="<?php echo $madre?>" data-padre_add="<?php echo $padre?>"data-obs_add="<?php echo $obs?>">
                                
                                <i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $inseminacion_id;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                    		</td>
							
						</tr>
						<?php }?>
						<tr>
							<td colspan='8'> 
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