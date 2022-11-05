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
							<label>Producto</label>
							<input type="text" name="producto_edit"  id="producto_edit" class="form-control" required>
							<input type="hidden" name="edit_id" id="edit_id" >
						</div>
						<div class="form-group">
							<label>Dosis</label>
							<input type="text" name="dosis_edit"  id="dosis_edit" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Indicación</label>
							<input type="text" name="ind_edit"  id="ind_edit" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Observación</label>
							<input type="text" name="obs_edit"  id="obs_edit" class="form-control" >
							
						</div>



						<div class="form-group">
							<label>Nº de animal</label>
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
							<label>Fecha de sanitación</label>
							<input type="date" name="fecha_edit" id="fecha_edit" class="form-control" required>
						</div>


										
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" accesskey = "s" value="Guardar">
					</div>
				</form>
			</div>
		</div>
	</div>