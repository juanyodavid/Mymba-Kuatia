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
							<label>Cantidad</label>
							<input type="number" name="cantidad_edit"  id="cantidad_edit" class="form-control" required>
							<input type="hidden" name="edit_id" id="edit_id" >
						</div>
						<div class="form-group">
							<label>Peso de venta</label>
							<input type="number"  name="pesok_edit" id="pesok_edit" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Precio por kilo</label>
							<input type="number" name="precio_edit" id="precio_edit" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Suma total</label>
							<input type="number" name="total_edit" id="total_edit" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Fecha</label>
							<input type="date" name="fecha_edit" id="fecha_edit" class="form-control" required>
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