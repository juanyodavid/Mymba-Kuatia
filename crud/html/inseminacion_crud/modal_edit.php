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
							<label>Fecha de servicio</label>
							<input type="date" name="fecha_edit" id="fecha_edit" class="form-control" required>
							<input type="hidden" name="edit_id" id="edit_id" >
						</div>
						<div class="form-group">
							<label>Madre</label>
							<select name="madre_edit"  id="padre_edit" class="form-control" required>
        						<?php
        				         $query2 =mysqli_query($con,"SELECT * FROM principal");
         						 while ($valores = mysqli_fetch_array($query2)) {
          							echo '<option value="'.$valores[id_animal].'">'.$valores[id_animal].'</option>';
          						}
          						?>
      						</select>
			
						</div>
						<div class="form-group">
							<label>Padre</label>
							<select name="padre_edit"  id="padre_edit" class="form-control" >
        						<?php
        				         $query2 =mysqli_query($con,"SELECT * FROM principal");
         						 while ($valores = mysqli_fetch_array($query2)) {
          							echo '<option value="'.$valores[id_animal].'">'.$valores[id_animal].'</option>';
          						}
          						?>
      						</select>
			
						</div>
						 						
						<div class="form-group">
							<label>Observación</label>
							<input type="text" name="obs_edit" id="obs_edit" class="form-control" >
						</div>
												 				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" accesskey="s" class="btn btn-success" value="Guardar">
					</div>
				</form>
			</div>
		</div>
	</div>