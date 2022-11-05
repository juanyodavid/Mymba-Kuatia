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
							<label>Potrero</label>
						<input type="text" name="edit_nombre"  id="edit_nombre" class="form-control" required>
							<input type="hidden" name="edit_id" id="edit_id" >
						</div>
						<div class="form-group">
							<label>Tamaño (has.)</label>
							<input type="number" name="tam_edit"  id="tam_edit" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Área útil (%)</label>
							<input type="number" name="area_edit"  id="area_edit" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Descripción</label>
							<input type="text" name="edit_name" id="edit_name" class="form-control" required>
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