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
							<label>Id</label>
							<input type="number" name="edit_id"  id="edit_id" class="form-control" required>
							<input type="hidden" name="edit_id2"  id="edit_id2" >
						</div>
						<div class="form-group">
							<label>Propietario</label>
							<input type="text" name="propietario_edit"  id="propietario_edit" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Lugar de expedición</label>
							<input type="text" name="lugar_edit" id="lugar_edit" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Fecha de expedicion</label>
							<input type="date" name="fecha_edit" id="fecha_edit" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Diseño</label>
							<input type="text" name="diseno_edit"  id="diseno_edit" class="form-control" required>
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