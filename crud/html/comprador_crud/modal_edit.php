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
							<label>Nombre</label>
							<input type="text" name="nombre_edit"  id="nombre_edit" class="form-control" required>
							<input type="hidden" name="edit_id" id="edit_id" >
						</div>
						<div class="form-group">
							<label>Ruc</label>
							<input type="text" name="ruc_edit"  id="ruc_edit" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Celular</label>
							<input type="text" name="cel_edit"  id="cel_edit" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Dirección</label>
							<input type="text" name="dir_edit"  id="dir_edit" class="form-control" >
						</div>
						<div class="form-group">
							<label>Observación</label>
							<input type="text" name="obs_edit"  id="obs_edit" class="form-control" >
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