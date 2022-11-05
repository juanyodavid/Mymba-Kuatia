<?php
	
	/* Connect To Database*/
require_once ("../../conexion.php");// conecta con la base de datos


// Esto evaluará a TRUE así que el texto se imprimirá.

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';// en la variable accion se pregunta si se realizo alguna accion
if($action == 'ajax'){
	if (isset($_GET['var'])) {
		$test='id_paricion';
    	echo "hola";
	}
 	else {
    	$test = 'id_paricion';
    	// $orden="hola";
	}	
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
    $tables="paricion";
	$campos="*";
	$sWhere=" paricion.id_cria LIKE '%".$query."%'"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere.=" order by paricion.".$test;
	
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
						<th class='text-center'><a href="vista_usuario.php?orden="Holaaa"">Id</a></th>  
						<th class='text-center'><a href="lote.php?orden="nombre_lote"" >Id de cria</a></th>
						<th class='text-center'><a href="lote.php?orden=observ_lote" >Carimbo</a> </th>
						<th class='text-center'><a href="js/lote_script.js?orden=fecha_lote" >Sexo</a> </th>
						<th class='text-center'><a href="js/lote_script.js?orden=fecha_lote" >Raza</a> </th>
						<th class='text-center'><a href="js/lote_script.js?orden=fecha_lote" >Pelaje</a> </th>
						<th class='text-center'><a href="js/lote_script.js?orden=fecha_lote" >Madre</a> </th>
						<th class='text-center'><a href="js/lote_script.js?orden=fecha_lote" >Padre</a> </th>
						<th class='text-center'><a href="js/lote_script.js?orden=fecha_lote" >Fecha de par.</a> </th>
						<th class='text-center'><a href="js/lote_script.js?orden=fecha_lote" >Estado</a> </th>
						<th class='text-center'><a href="js/lote_script.js?orden=fecha_lote" >Obs.</a> </th>
	
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$par=$row['id_paricion'];
							$cria=$row['id_cria'];
							$carimbo=$row['carimbo_cria'];
							$sexo=$row['sexo_cria'];						
							$fecha=$row['fecha_par'];						
							$obs=$row['observ_paricion'];						
							$estado=$row['estado'];						
							$madre=$row['madre_id'];						
							$padre=$row['padre_id'];						
							$raza=$row['id_raza'];		
							$pelaje=$row['id_pelaje'];		
				
							$finales++;
						?>	
						<tr >
							<td class='text-center'><?php echo $par;?></td>
							<td class='text-center'><?php echo $cria;?></td>
							<td class='text-center'><?php echo $carimbo;?></td>
							<td class='text-center'><?php echo $sexo;?></td>
							<td class='text-center'><?php echo $raza;?></td>
							<td class='text-center'><?php echo $pelaje;?></td>
							<td class='text-center'><?php echo $madre;?></td>
							<td class='text-center'><?php echo $padre;?></td>
							<td class='text-center'><?php echo $fecha;?></td>
							<td class='text-center'><?php echo $estado;?></td>
							<td class='text-center'><?php echo $obs;?></td>
							
							<td>
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-cria_add="<?php echo $cria?>"data-carimbo_add="<?php echo $carimbo?>"data-sexo_add="<?php echo $sexo?>"data-raza_add="<?php echo $raza?>"data-pelaje_add="<?php echo $pelaje?>"data-madre_add="<?php echo $madre?>"data-padre_add="<?php echo $padre?>" data-fecha_add="<?php echo $fecha?>"data-estado_add="<?php echo $estado?>"data-observacion_add="<?php echo $obs?>"data-id="<?php echo $par;?>">
                                
                                <i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $par;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
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