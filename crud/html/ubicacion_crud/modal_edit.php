<?php  require_once ("conexion.php"); ?>

<div id="editProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_product" id="edit_product">
					<div class="modal-header">						
						<h4 class="modal-title">Editar</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Lote</label>
						<input type="hidden" name="edit_id"  id="edit_id" >
						<select name="lote_edit"  id="lote_edit" class="form-control" required>
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
							<select name="anim_edit"  id="anim_edit" class="form-control" required>
        						<?php
        				         $query2 =mysqli_query($con,"SELECT * FROM principal");
         						 while ($valores = mysqli_fetch_array($query2)) {
          							echo '<option value="'.$valores[id_animal].'">'.$valores[id_animal].'</option>';
          						}
          						?>
      						</select>
			
						</div>
						 <div class="form-group">
							<label>Potrero</label>
							<select name="potrero_edit"  id="potrero_edit" class="form-control" required>
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
							<input type="date" name="fecha_edit" id="fecha_edit" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Obs.</label>
							<input type="varchar" name="obs_edit" id="obs_edit" class="form-control" required>
						</div>	
										
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Guardar">
					</div>
				</form>
			</div>
		</div>
	</div>