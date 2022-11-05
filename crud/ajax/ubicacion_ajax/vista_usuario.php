<?php
	
	/* Connect To Database*/
require_once ("../../conexion.php");// conecta con la base de datos


// Esto evaluará a TRUE así que el texto se imprimirá.
if (isset($_GET['var'])) {
    $test='nombre_lote';
    echo "hola";
}
 else {
    $test = 'id_lote';
}
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';// en la variable accion se pregunta si se realizo alguna accion
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
    
    


	$tables="ubicacion";
	$campos="*";
	$sWhere=" ubicacion.id_animal LIKE '%".$query."%'"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
//ESTO es para estirar de otra tabla	//$sWhere1=" ID in(SELECT ID from tabla2 Where incognita LIKE '%".$query2."%')";  
	$sWhere.=" order by ubicacion.".$test;
	
	
	
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
						<th class='text-center'><a href="lote.php?orden=nombre_lote" >Id lote</a></th>
						<th class='text-center'><a href="lote.php?orden=observ_lote" >Id Animal</a> </th>
						<th class='text-center'><a href="lote.php?orden=observ_lote" >Id potrero</a> </th>
						<th class='text-center'><a href="js/lote_script.js?orden=fecha_lote" >Fecha de entrada</a> </th>
						<th class='text-center'><a href="js/lote_script.js?orden=fecha_lote" >Obs.</a> </th>
						
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$ubi_id=$row['id_ubicacion'];
							$lote=$row['id_lote'];
							$anim=$row['id_animal'];
							$potrero=$row['id_potrero'];
							$fecha=$row['fecha_entrada'];						
							$obs=$row['observacion_ubic'];						
							$finales++;
						?>	
						<tr >
							<td class='text-center'><?php echo $ubi_id;?></td>
							<td class='text-center'><?php echo $lote;?></td>
							<td class='text-center'><?php echo $anim;?></td>
							<td class='text-center'><?php echo $potrero;?></td>
							<td class='text-center'><?php echo $fecha;?></td>
							<td class='text-center'><?php echo $obs;?></td>
							
							<td>
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-id="<?php echo $ubi_id;?>"data-lote_add="<?php echo $lote?>" data-anim_add="<?php echo $anim?>"data-potrero_add="<?php echo $potrero?>"data-fecha_add="<?php echo $fecha?>"data-obs_add="<?php echo $obs?>">
                                
                                <i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $ubi_id;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
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