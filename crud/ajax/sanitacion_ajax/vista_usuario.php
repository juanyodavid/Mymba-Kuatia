<?php
	
	/* Connect To Database*/
require_once ("../../conexion.php");// conecta con la base de datos


// Esto evaluará a TRUE así que el texto se imprimirá.

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';// en la variable accion se pregunta si se realizo alguna accion
if($action == 'ajax'){
    	$test = 'id_sanitacion';
    
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
    $tables="sanitacion";
	$campos="*";
	$sWhere=" sanitacion.id_animal LIKE '%".$query."%'"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere.=" order by sanitacion.".$test;
	
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
						<th class='text-center'>Id sanit.</th>  
						<th class='text-center'>Id animal</th>
						<th class='text-center'>Producto</th>
						<th class='text-center'>Dosis </th>
						<th class='text-center'>Indicación </th>

						<th class='text-center'>Observación </th>

						<th class='text-center'>Fecha de sanitacion </th>
	
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$id_sanit=$row['id_sanitacion'];
							$id_anim=$row['id_animal'];
							$prod=$row['producto'];
							$dosis=$row['dosis'];
							$ind=$row['indicacion'];
							$obs=$row['obser_sanit'];
							$fecha=$row['fecha_sanit'];
													
							$finales++;
						?>	
						<tr >
							<td class='text-center'><?php echo $id_sanit;?></td>
							
							<td class='text-center'><?php $query2 =mysqli_query($con,"SELECT * FROM `principal` WHERE `id_animal` = ".$id_anim."");
        						 while ($valores = mysqli_fetch_array($query2)) {echo $id_anim."-".$valores['sexo']."-"."C: ".$valores['carimbo'] ;}?>	</td>

							<td class='text-center'><?php echo $prod;?></td>
							<td class='text-center'><?php echo $dosis;?></td>
							<td class='text-center'><?php echo $ind;?></td>
							<td class='text-center'><?php echo $obs;?></td>
							<td class='text-center'><?php echo $fecha;?></td>
							
							
							<td>
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-producto_add="<?php echo $prod?>" 
								
								data-dosis_add="<?php echo $dosis?>"data-ind_add="<?php echo $ind?>"data-obs_add="<?php echo $obs?>"data-fecha_add="<?php echo $fecha?>"data-anim_add="<?php echo $id_anim?>"data-id="<?php echo $id_sanit;?>">
                                
                                <i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $id_sanit;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                    		</td>	
						</tr>
						<?php }?>
						<tr>
							<td colspan='10'> 
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