<?php
	
	/* Connect To Database*/
require_once ("../../conexion.php");// conecta con la base de datos

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';// en la variable accion se pregunta si se realizo alguna accion
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
    $test = 'id_animal';
	$tables="ubicacion";
	$campos="*";
	$sWhere=" ubicacion.id_lote LIKE '".$query."'"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
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
			<table class="table table-striped table-hover" id="tabla">
				<thead>
					<tr>
						<th class='text-center'onclick="sortTable_number(0)"><a >Id Animal</a> </th>
						<th class='text-center'onclick="sortTable_number(1)"><a >HBP</a> </th>
						<th class='text-center'onclick="sortTable_word(2)"><a >Pelaje</a> </th>
						<th class='text-center'onclick="sortTable_word(3)"><a >Raza</a> </th>
						<th class='text-center'onclick="sortTable_word(4)"><a >Cuerno</a> </th>
						<th class='text-center'onclick="sortTable_number(5)"><a >Carimbo</a> </th>
						<th class='text-center'onclick="sortTable_word(6)"><a >Obs. animal</a> </th>
						<th class='text-center'onclick="sortTable_number(7)"><a >Fecha de entrada</a> </th>
						<th class='text-center'onclick="sortTable_word(8)"><a >Obs.</a> </th>
						
						<!-- <th></th> -->
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
							if ($finales == 1) 
								{ 
									echo "*Potrero: "; $query2 =mysqli_query($con,"SELECT nombre_pot FROM `potrero` WHERE id_potrero =".$potrero."");
         						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['nombre_pot'] ;}
									
								  
								
								echo "   		*Lote: $lote";

									echo "		*Mostrando  $numrows registros";
									
														

								}
						 						
						?>	
						<tr >
							<td class='text-center'><?php echo $anim;?></td>
							<td class='text-center'><?php   $query2 =mysqli_query($con,"SELECT  hbp_fuego FROM principal WHERE id_animal =".$anim."");
         						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['hbp_fuego'];	}
          						?></td>

							<td class='text-center'><?php   $query2 =mysqli_query($con,"SELECT color_pelaje FROM `pelaje` WHERE id_pelaje IN(SELECT id_pelaje FROM principal WHERE (".$anim." = principal.id_animal))");
         						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['color_pelaje'] ;}
          						?></td>
          						<td class='text-center'><?php   $query2 =mysqli_query($con,"SELECT nom_raza FROM `raza` WHERE id_raza IN(SELECT id_raza FROM principal WHERE (".$anim." = principal.id_animal))");
         						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['nom_raza'] ;}
          						?></td>
          						<td class='text-center'><?php   $query2 =mysqli_query($con,"SELECT tipo_cuerno FROM `cuerno` WHERE id_cuerno IN(SELECT id_cuerno FROM principal WHERE (".$anim." = principal.id_animal))");
         						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['tipo_cuerno'] ;}
          						?></td>

          					<td class='text-center'><?php   $query2 =mysqli_query($con,"SELECT  carimbo FROM principal WHERE id_animal =".$anim."");
         						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['carimbo'];	}
          						?></td>
          					<td class='text-center'><?php   $query2 =mysqli_query($con,"SELECT  observacion FROM principal WHERE id_animal =".$anim."");
         						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['observacion'];	}
          						?></td>
						
							
							<td class='text-center'><?php echo $fecha;?></td>
							<td class='text-center'><?php echo $obs;?></td>
							
							</tr>
						<?php }?>
						<tr>
							
				
						</tr>

						<script>
							var word = -1;
							
function sortTable_word(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("tabla");
  switching = true;
word *= -1 ;
  //Set the sorting direction to ascending:
   if (word == 1 ) {
		dir = "asc"; 	}else{dir = "desc";}
  // 	 
  // 	
  // }
   
 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

<script>
var num = -1 ;
function sortTable_number(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("tabla");
  switching = true;
  num *= -1 ;
  //Set the sorting direction to ascending:
 if (num == 1 ) {
		dir = "asc"; 	}else{dir = "desc";}
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (Number(x.innerHTML.toLowerCase()) > Number(y.innerHTML.toLowerCase())) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (Number(x.innerHTML.toLowerCase()) <Number (y.innerHTML.toLowerCase())) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
				</tbody>			
			</table>
		</div>	

	
	
	<?php	
	}	
}
?>          