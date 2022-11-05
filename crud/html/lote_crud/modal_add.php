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
							<input type="text" name="lote_add"  id="lote_add" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Observación</label>
							<input type="text" name="observacion_add" id="observacion_add" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Fecha de creación</label>
							<input type="date" name="fecha_add" id="fecha_add" class="form-control" required>
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