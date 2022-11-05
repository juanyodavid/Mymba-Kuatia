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
							<label>Producto</label>
							<input type="text" name="producto_add"  id="producto_add" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Dosis</label>
							<input type="text" name="dosis_add" id="dosis_add" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Indicación</label>
							<input type="text" name="indicacion_add" id="indicacion_add" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Observación</label>
							<input type="text" name="observacion_add" id="observacion_add" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Fecha de vacunación</label>
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