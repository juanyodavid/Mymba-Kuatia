<?php
	
	/* Connect To Database*/
	require_once ("../../conexion.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="principal";
	$campos="*";
	$sWhere="principal.id_animal LIKE '%".$query."%'";
	$sWhere.=" order by principal.id_animal";
	
	
	
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
						<th class='text-center'>ID animal</th>  
						<th class='text-center'>HBP fuego </th>
						<th class='text-center'>Pelaje </th>
						<th class='text-center'>Cuerno</th>
						<th class='text-right'>Carimbo</th>
						<th class='text-right'>Raza</th>
						<th class='text-right'>Marca</th>
						<th class='text-right'>Padre</th>
						<th class='text-right'>Madre</th>
						<th class='text-right'>Obs.</th>
						<th class='text-right'>P. cárnico</th>
						<th class='text-right'>P. lechero</th>
						<th class='text-right'>Sexo</th>
						<th class='text-right'>Nacimiento</th>
						<th class='text-right'>Estado</th>
						<th class='text-right'>Foto</th>
						
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$p_id=$row['id_animal'];
							$p_fuego=$row['hbp_fuego'];
							$p_pelaje=$row['id_pelaje'];
							$p_cuerno=$row['id_cuerno'];
							$p_carimbo=$row['carimbo'];
							$p_marca=$row['id_marca'];
							$p_padre=$row['padre'];
							$p_madre=$row['madre'];
							$p_observacion=$row['observacion'];
							$p_carne=$row['perfil_carnico'];
							$p_leche=$row['perfil_lechero'];
							$p_sexo=$row['sexo'];
							$p_fecha=$row['fecha_nac'];
							$p_estado=$row['estado'];
							$p_foto=$row['foto'];
							$p_raza=$row['id_raza'];
													
							$finales++;
						?>	
						<tr >
							<td class='text-center'><?php echo $p_id;?></td>
							<td class='text-center'><?php echo $p_fuego;?></td>
							<td class='text-center'><?php $query2 =mysqli_query($con,"SELECT `color_pelaje` FROM `pelaje` WHERE `id_pelaje` = ".$p_pelaje."");
        						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['color_pelaje'] ;}?>	</td>
							<td class='text-center'><?php $query2 =mysqli_query($con,"SELECT `tipo_cuerno` FROM `cuerno` WHERE `id_cuerno` = ".$p_cuerno."");
        						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['tipo_cuerno'] ;}?></td>
							<td class='text-center'><?php echo $p_carimbo;?></td>
							<td class='text-center'><?php $query2 =mysqli_query($con,"SELECT `nom_raza` FROM `raza` WHERE `id_raza` = ".$p_raza."");
        						
        						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['nom_raza'] ;}?></td>
							
							<td class='text-center'><?php $query2 =mysqli_query($con,"SELECT `propietario_marca` FROM `marca` WHERE `id_marca` = ".$p_marca."");
        						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['propietario_marca'] ;}?></td>
							<td class='text-center'><?php echo $p_padre;?></td>
							<td class='text-center'><?php echo $p_madre;?></td>
							<td class='text-center'><?php echo $p_observacion;?></td>
							<td class='text-center'><?php echo $p_carne;?></td>
							<td class='text-center'><?php echo $p_leche;?></td>
							<td class='text-center'><?php echo $p_sexo;?></td>
							<td class='text-center'><?php echo $p_fecha;?></td>
							<td class='text-center'><?php echo $p_estado;?></td>
							<td class='text-center'><?php echo $p_foto;?></td>
                            
						<td>
							
							<a href="#"data-target="#editProductModal" class="edit" data-toggle="modal" data-fuego_add="<?php echo $p_fuego;?>" data-pelaje_add="<?php echo $p_pelaje;?>" data-cuerno_add="<?php echo $p_cuerno;?>" data-carimbo_add="<?php echo $p_carimbo;?>" data-raza_add="<?php echo $p_raza;?>" data-marca_add="<?php echo $p_marca;?>" data-padre_add="<?php echo $p_padre;?>" data-madre_add="<?php echo $p_madre;?>" data-observacion_add="<?php echo $p_observacion;?>" data-carne_add="<?php echo $p_carne;?>" data-leche_add="<?php echo $p_leche;?>" data-sexo_add="<?php echo $p_sexo;?>" data-fecha_add="<?php echo $p_fecha;?>" data-estado_add="<?php echo $p_estado;?>" data-foto_add="<?php echo $p_foto;?>"data-id_add="<?php echo $p_id;?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $p_id;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                    		</td>
							
							
							
							
							
							
						</tr>
						<?php }?>
						<tr>
							<td colspan='17'> 
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