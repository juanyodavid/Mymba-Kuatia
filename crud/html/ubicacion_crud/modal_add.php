<?php  require_once ("conexion.php"); ?>
<div id="addProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_product" id="add_product">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						 <div class="form-group">
							<label>Lote</label>
							<select name="lote_add"  id="lote_add" class="form-control" required>
        						<?php
        				         $query2 =mysqli_query($con,"SELECT * FROM lote");
         						 while ($valores = mysqli_fetch_array($query2)) {
          							echo '<option value="'.$valores[id_lote].'">'.$valores[id_lote].'-'.$valores[nombre_lote].'</option>';
          						}
          						?>
      						</select>
			
						</div>
						<div class="form-group">
							<label>Id animal</label>
							<select name="anim_add"  id="anim_add" class="form-control" required>
        						<?php
								// $query2 =mysqli_query($con,"SELECT * FROM principal WHERE principal.id_animal LIKE % ");
								
								 $query2 =mysqli_query($con,"SELECT * FROM principal");
								 $aux = 0;
         						 while ($valores = mysqli_fetch_array($query2)) {
									if ($aux == 0){  
          							echo '<option value="'.$valores[id_animal].'">'.$valores[id_animal].'</option>';
									//$aux++;
								}}
          						?>
      						</select>
			
						</div>
						 <div class="form-group">
							<label>Potrero</label>
							<select name="potrero_add"  id="potrero_add" class="form-control" required>
        						<?php
        				         $query2 =mysqli_query($con,"SELECT * FROM potrero");
         						 while ($valores = mysqli_fetch_array($query2)) {
          							echo '<option value="'.$valores[id_potrero].'">'.$valores[id_potrero].'-'.$valores[nombre_pot].'</option>';
          						}
          						?>
      						</select>
			
						</div>
						
						<div class="form-group">
							<label>Fecha de entrada</label>
							<input type="date" name="fecha_add" id="fecha_add" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Obs.</label>
							<input type="varchar" name="obs_add" id="obs_add" class="form-control" required>
						</div>
						 				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Guardar">
					</div>
				</form>
			</div>
		</div>
	</div>